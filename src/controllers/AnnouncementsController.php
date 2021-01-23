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
        if(!$this->isLoggedIn())
        {
            $this->accessDenied();
            return;
        }

        $search_key = $_POST['keyword'] == null ? "" : $_POST['keyword'];
        
        $items = $this->getAllAnnouncements($search_key);
        $this->render('job-listening', ['offers' => $items]);
    }

    public function announcementDetails()
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        $url = $_SERVER['REQUEST_URI'];
        $id = substr($url, strrpos($url, '/') + 1);

        $announcement = $this->announcementRepo->getAnnouncementById(intval($_GET['id']));
        
        $isAnnouncer = false;
        session_start();
        if($announcement->getAdvertiser() == $_SESSION['email'])
        {
            $appliers = $this->announcementRepo->getUsersAppliedFor(intval($_GET['id']));
            return $this->render('announcement-details', ['data' => $announcement, 'appliers' => $appliers]); // announcement-details
        }
        else
            return $this->render('announcement-details', ['data' => $announcement]);
    }

    public function announcementForm()
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        $this->render('announcement-form');
    }

    public function getAllAnnouncements(string $key): array 
    {
        return $this->announcementRepo->getAnnouncement($key);
    }

    public function addAnnouncement()
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        session_start();
        $announcement = new Announcement($_POST['title'],
             $_POST['announcement-description'], $_POST['localization'],
              intval($_POST['experience']), date("Y-m-d"), null, $_SESSION['id']);

        $this->announcementRepo->addAnnouncement($announcement);

        header("Location: {$url}/accountDetails");
    }

    public function removeAnnouncement($id_announcement)
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        session_start();
        $this->announcementRepo->removeAnnouncement($id_announcement);
    }

    public function addUserAsApplier($id_announcement)
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        session_start();
        $this->announcementRepo->addApplier($_SESSION['id'], $id_announcement);
    }

    public function removeApplier($id_announcement)
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        session_start();
        $this->announcementRepo->removeApplier($_SESSION['id'], $id_announcement);
    }

    public function removeUserAppliance($id_announcement)
    {
        $this->handleAccess();
        session_start();
        if($this->hasExceedInactivityTime()) //|| $_SESSION['id'] !== $id_user        
            return header("Location: {$this->URL}/logout");
        $this->announcementRepo->removeApplier($_GET['user'], $id_announcement);
    }
}