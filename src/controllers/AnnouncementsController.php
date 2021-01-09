<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';
require_once  __DIR__.'/../repository/AnnouncementRepository.php';


class AnnouncementsController extends AppController
{

    public function jobListening()
    {
        session_start();
        if($_SESSION["loggedIn"] != true) {
            echo("Access denied!");
            exit();
        }
        $search_key = $_POST['keyword'] == null ? "" : $_POST['keyword'];
        
        $items = $this->getAllAnnouncements($search_key);
        $this->render('job-listening', ['offers' => $items]);
    }

    public function announcementDetails()
    {
        $url = $_SERVER['REQUEST_URI'];
        $id = substr($url, strrpos($url, '/') + 1);

        $repo = new AnnouncementRepository();

        $announcement = $repo->getAnnouncementById(intval($_GET['id']));
        
        $this->render('announcement-details', ['data' => $announcement]); // announcement-details
    }

    public function announcementForm()
    {
        session_start();
        if($_SESSION["loggedIn"] != true) {
            echo("Access denied!");
            exit();
        }
        $this->render('announcement-form');
    }

    public function getAnnouncement(string $username): ?array
    {
        $user = new User('test@abcdef', 'password', 'name');
        $announcement = new Announcement('random title', 'random description',
            'Warsaw', 5);
        $announcement->setAdvertiser($user);


        if(($announcement->getUser())->getName() === $username){
            return $announcement;
        }
        return null;
    }

    public function getAllAnnouncements(string $key): array 
    {
        $repo = new AnnouncementRepository();

        return $repo->getAnnouncement($key);
    }

    public function addAnnouncement(): void
    {
        $repo = new AnnouncementRepository();
        session_start();
        $announcement = new Announcement($_POST['title'],
             $_POST['announcement-description'], $_POST['localization'],
              intval($_POST['experience']), date("Y-m-d"), null, $_SESSION['id']);

        $repo->addAnnouncement($announcement);

        header("Location: {$url}/accountDetails");
    }

    public function removeAnnouncement($id_announcement)
    {
        session_start();
        $repo = new AnnouncementRepository();
        $repo->removeAnnouncement($id_announcement);
    }

    public function addUserAsApplier($id_announcement)
    {
        session_start();
        $repo = new AnnouncementRepository();
        $repo->addApplier($_SESSION['id'], $id_announcement);
    }

    public function removeApplier($id_announcement)
    {
        session_start();
        $repo = new AnnouncementRepository();
        $repo->removeApplier($_SESSION['id'], $id_announcement);
    }

}