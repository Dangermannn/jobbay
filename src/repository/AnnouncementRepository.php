<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once  __DIR__.'/../models/Announcement.php';

class AnnouncementRepository extends Repository
{
    public function getAnnouncement(string $key) : ?array
    {
        $return = [];

        $temp = "%$key%";
        $statement = $this->database->connect()->prepare(
          "SELECT * FROM public.announcements WHERE LOWER(title) LIKE LOWER(:s) OR LOWER(description) LIKE LOWER(:s)
          ORDER BY added
        ");

        $statement->bindParam(':s', $temp, PDO::PARAM_STR);
        $statement->execute();

        $announcements = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($announcements as $announcement){
            $return[] = new Announcement(
                $announcement['title'],
                $announcement['description'],
                $announcement['localization'],
                intval($announcement['experience']),
                $announcement['added'],
                intval($announcement['id']),           
            );
        }
        return $return;
    }

    public function getAnnouncementById(int $id) : Announcement
    {
        $statement = $this->database->connect()->prepare(
            "SELECT announcements.id, announcements.title, announcements.description,
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
            intval($item['id']),
            $item['email']);
    }

    public function getAnnouncementsUserAppliedFor(int $userId)
    {
        $statement = $this->database->connect()->prepare(
            'SELECT announcements.id, announcements.title, announcements.localization,
            announcements.experience, announcements.added
            FROM public.announcements_users
                LEFT JOIN public.users
                    ON id_user = users.id
                LEFT JOIN public.announcements
                    ON id_announcement = announcements.id
            WHERE public.announcements_users.id_user = :id'
        );

        $statement->bindParam(":id", $userId, PDO::PARAM_INT);

        $statement->execute();

        $announcements = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($announcements as $announcement){
            $return[] = new Announcement(
                $announcement['title'],
                null,
                $announcement['localization'],
                intval($announcement['experience']),
                $announcement['added'],
                intval($announcement['id']),
                null
            );
        }

        return $return;
    }

    public function getAnnouncementsUserShared(int $userId)
    {
        $statement = $this->database->connect()->prepare(
            '
            SELECT public.announcements.title, public.announcements.localization,
                public.announcements.experience, public.announcements.added,
                public.announcements.id
                FROM public.announcements
                    WHERE public.announcements.id_advertiser = :id
            '
        );

        $statement->bindParam(":id", $userId, PDO::PARAM_INT);
        $statement->execute();

        $announcements = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach($announcements as $announcement){
            $return[] = new Announcement(
                $announcement['title'],
                null,
                $announcement['localization'],
                intval($announcement['experience']),
                $announcement['added'],
                intval($announcement['id']),
                null
            );
        }
        return $return;
    }

    public function addAnnouncement(Announcement $announcement): void
    {
        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.announcements 
                        (id_advertiser, description, title, localization, experience, added)
                        VALUES (?, ?, ?, ?, ?, ?)"
        );

        $statement->execute([
            $announcement->getAdvertiser(),
            $announcement->getDescription(),
            $announcement->getTitle(),
            $announcement->getLocalization(),
            $announcement->getExperience(),
            $announcement->getAdded()
        ]);
    }

    public function removeAnnouncement(int $id_announcement)
    {
        $statement = $this->database->connect()->prepare(
          '
            DELETE FROM public.announcements
                WHERE id = :id
          '
        );

        $statement->bindParam(":id", $id_announcement, PDO::PARAM_INT);

        $statement->execute();
    }

    public function addApplier(int $id_user, int $id_ad)
    {
        $statement = $this->database->connect()->prepare(
            'INSERT INTO public.announcements_users
            (id_user, id_announcement) VALUES (?, ?)
            '
        );

        $statement->execute([$id_user, $id_ad]);
    }

    public function removeApplier(int $id_user, int $id_ad)
    {
        $statement = $this->database->connect()->prepare(
            '
            DELETE FROM public.announcements_users
                WHERE id_user = ? AND id_announcement = ?
            '
        );

        $statement->execute([$id_user, $id_ad]);
    }
}