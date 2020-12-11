<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once  __DIR__.'/../models/Announcement.php';

class AnnouncementRepository extends Repository
{
    public function getAnnouncement(string $key) : ?Announcement{
        $statement = $this->database->connect()->prepare(
          "SELECT * FROM public.announcements WHERE title LIKE :key OR description LIKE :key 
    ");

        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $announcements = $statement->fetch(PDO::FETCH_ASSOC);

        // TODO: Change to return announcements with user obj
        $arrToReturn = [];
        foreach($announcements as $announcement){
            //array_push($arrToReturn, new Announcement(''))
        }
        return null;
    }

    public function addAnnouncement(Announcement $announcement): void{
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