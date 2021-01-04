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

    public function getAnnouncementById(int $id)
    {
        $statement = $this->database->connect()->prepare(
          "SELECT * FROM public.announcements WHERE id = :id"
        );

        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
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