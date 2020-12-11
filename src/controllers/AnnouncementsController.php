<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';
require_once  __DIR__.'/../repository/AnnouncementRepository.php';


class AnnouncementsController extends AppController{

    private $projectRepository;

    public function __construct($projectRepository)
    {
        parent::_construct();
        $this->projectRepository = $projectRepository;
    }

    public function jobListening(){
        $items = $this->getAllAnnouncements();
        $this->render('job-listening', ['offers' => $items]);
    }

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
        //return $this->render('job-listening', ['offers' => [$announcement, $announcement2, $announcement3]]);
    }

    public function addAnnouncement(): void{

        $announcement = new Announcement($_POST['user'], $_POST['title'], $_POST['description'], $_POST['localization'], $_POST['experience']);
        $this->projectRepository->addAnnouncement($announcement);
    }
}