<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';
require_once  __DIR__.'/../repository/AnnouncementRepository.php';


class AnnouncementsController extends AppController
{

    public function jobListening(){
        session_start();
        if($_SESSION["loggedIn"] != true) {
            echo("Access denied!");
            exit();
        }
        $search_key = $_POST['keyword'] == null ? "" : $_POST['keyword'];
        
        $items = $this->getAllAnnouncements($search_key);
        $this->render('job-listening', ['offers' => $items]);
    }

    public function getAnnouncement(string $username): ?array{
        $user = new User('test@abcdef', 'password', 'name');
        $announcement = new Announcement('random title', 'random description',
            'Warsaw', 5);
        $announcement->setAdvertiser($user);


        if(($announcement->getUser())->getName() === $username){
            return $announcement;
        }
        return null;
    }

    public function getAllAnnouncements(string $key): array {
        
        $user = new User('test@abcdef', 'password', 'name');
        $announcement = new Announcement('random title', 'random description',
            'Warsaw', 5);
        $announcement2 = new Announcement('random title2', 'random description2',
            'Warsaw2', 3);
        $announcement3 = new Announcement('random title3', 'random description4',
            'Warsaw5', 3);

        $repo = new AnnouncementRepository();

        return $repo->getAnnouncement($key);

        //return [$announcement, $announcement2, $announcement3];
    }

    public function addAnnouncement(): void{

        $announcement = new Announcement($_POST['user'], $_POST['title'], $_POST['description'], $_POST['localization'], $_POST['experience']);
        $this->projectRepository->addAnnouncement($announcement);
    }
}