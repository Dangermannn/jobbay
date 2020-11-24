<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';

class AnnouncementsController extends AppController{

    public function getAnnouncement(string $username): ?Announcement{
        $user = new User('test@abcdef', 'password', 'name');
        $announcement = new Announcement($user, 'random title', 'random description',
            'Warsaw', 5);

        if(($announcement->getUser())->getName() === $username){
            return $announcement;
        }
        return null;
    }

    public function getAllAnnouncements(): array {
        $user = new User('test@abcdef', 'password', 'name');
        $announcement = new Announcement($user, 'random title', 'random description',
            'Warsaw', 5);
        $announcement2 = new Announcement($user, 'random title2', 'random description2',
            'Warsaw2', 3);
        $announcement3 = new Announcement($user, 'random title3', 'random description4',
            'Warsaw5', 3);


        return [$announcement, $announcement2, $announcement3];
    }

}