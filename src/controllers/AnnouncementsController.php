<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';
require_once  __DIR__.'/../repository/AnnouncementRepository.php';


class AnnouncementsController extends AppController
{
    private $repo;

    public function __construct()
    {
        parent::__construct();
        $this->announcementRepo = new AnnouncementRepository();
    }

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

        $announcement = $this->announcementRepo->getAnnouncementById(intval($_GET['id']));
        
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

    public function getAllAnnouncements(string $key): array 
    {
        return $this->announcementRepo->getAnnouncement($key);
    }

    public function addAnnouncement(): void
    {
        session_start();
        $announcement = new Announcement($_POST['title'],
             $_POST['announcement-description'], $_POST['localization'],
              intval($_POST['experience']), date("Y-m-d"), null, $_SESSION['id']);

        $this->announcementRepo->addAnnouncement($announcement);

        header("Location: {$url}/accountDetails");
    }

    public function removeAnnouncement($id_announcement)
    {
        session_start();
        $this->announcementRepo->removeAnnouncement($id_announcement);
    }

    public function addUserAsApplier($id_announcement)
    {
        session_start();
        $this->announcementRepo->addApplier($_SESSION['id'], $id_announcement);
    }

    public function removeApplier($id_announcement)
    {
        session_start();
        $this->announcementRepo->removeApplier($_SESSION['id'], $id_announcement);
    }

}