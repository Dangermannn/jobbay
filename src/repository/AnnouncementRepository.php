<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once  __DIR__.'/../models/Announcement.php';

class AnnouncementRepository extends Repository
{
    public function getAnnouncement(string $key) : ?array
    {
        $temp = "%$key%";
        $statement = $this->database->connect()->prepare(
          "SELECT * FROM public.announcements WHERE LOWER(title) LIKE LOWER(:s) OR LOWER(description) LIKE LOWER(:s)
    ");

        $statement->bindParam(':s', $temp, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

        //$arr = (object) $announcements;
        //return $arr;

    }

    public function getAnnouncementById(int $id) : Announcement
    {
        /*
        $statement = $this->database->connect()->prepare(
          "SELECT * FROM public.announcements WHERE id = :id
          LEFT JOIN public.users ON id_advertiser ="
        );
        */
        $statement = $this->database->connect()->prepare(
            "SELECT announcements.title, announcements.description,
            announcements.experience, announcements.localization,
            announcements.added, users.email 
            FROM public.announcements
                LEFT JOIN public.users
                    ON id_advertiser = users.id
                        WHERE announcements.id = :id"
        );


        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        
        $item = $statement->fetch(PDO::FETCH_ASSOC);
        
        return new Announcement(
            $item['title'],
            $item['description'],
            $item['localization'],
            intval($item['experience']),
            $item['added'],
            null,
            $item['email']);
    }

    public function addAnnouncement(Announcement $announcement): void
    {
        $date = new DateTime();
        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.announcements 
                        (id_advertiser, description, title, localization, experience, added)
                        VALUES (?, ?, ?, ?, ?, ?)"
        );
        $assignedById = 1;

        $statement->execute([
            $assignedById,
            $announcement->getDescription(),
            $announcement->getTitle(),
            $announcement->getLocalization(),
            $announcement->getExperience(),
            $date->format('Y-m-d')
        ]);
    }
}