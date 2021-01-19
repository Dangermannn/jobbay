<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/AnnouncementRepository.php';

class AccountController extends AppController{

    private const MAX_FILE_SIZE = 3000 * 3000;
    private const SUPPORTED_TYPES = ['application/pdf'];
    private const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    private $announcementRepo;
    private $userRepo;

    public function __construct()
    {
        parent::__construct();
        $this->announcementRepo = new AnnouncementRepository();
        $this->userRepo = new UserRepository();
    }

    public function accountDetails(){
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");

        $applied = $this->announcementRepo->getAnnouncementsUserAppliedFor($_SESSION['id']);
        $shared = $this->announcementRepo->getAnnouncementsUserShared($_SESSION['id']);

        $this->render('account-details', ['applied' => $applied, 'shared' => $shared]);
    }

    public function accountSettings(){
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");

        $this->render('account-settings');
    }


    public function accountInfo(){
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");

        $user = $this->userRepo->getUser($_GET['email']);
        $this->render('user-info', ['data' => $user]);
    }

    public function allUsers(){
        // TODO: changed to use repo from its class (NULL?)
        $repo = new UserRepository();
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");

        session_start();
        //$user = $this->$userRepo->getUser($_SESSION['email']);
        $user = $repo->getUser($_SESSION['email']);
        if($user->getRole() == 'admin')
        {
            //$users = $this->$userRepo->getAllUsers();
            $users = $repo->getAllUsers();
            $this->render('admin/all-users', ['users' => $users]);
        }
        else
            $this->accessDenied();     
    }

    public function activeUsers(){
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        
        session_start();
        $user = $this->userRepo->getUser($_SESSION['email']);
        if($user->getRole() == 'admin')
        {
            //$users = $this->$userRepo->getAllUsers();
            $users = $this->userRepo->getActiveUsers();
            $this->render('admin/logged-users', ['users' => $users]);
        }
        else
            $this->accessDenied();    
    }


    public function updateAccount(){
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");

        $password = $_POST["password"];

        if($password != $_POST["confirm-password"])
            return $this->render('account-settings', ['Passwords does not match!']);


        $city = $_POST["city"];
        $description = $_POST["profile-description"];

        $this->userRepo->updateUser($password, $city, $description, $_FILES['file']['tmp_name']);
        if(is_uploaded_file($_FILES['file']['tmp_name']) && $this->isFileValid($_FILES['file'])){
            
            move_uploaded_file(
                $_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            array_push($messages, 'Updated account successfully!');
            return $this->render('account-settings', ['messages' => [$this->messages]]);
        }
        return $this->render('account-details', ['messages' => $this->messages]);
    }

    public function removeUser($email)
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");

        session_start();
        if($_SESSION['role'] == 'admin')
            $this->userRepo->removeUser($email);
            
    }

    public function loggedUseres()
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");

        session_start();
        if($_SESSION['role'] == 'admin')
            $this->userRepo->removeUser($email);
    }

    public function getCv()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json"){
            $email = trim(file_get_contents("php://input"));
            $decodedEmail = json_decode($email, false);
            $userRepository = new UserRepository();
            $user = $userRepository->getUser($decodedEmail['email']);
            if($user->getCv() == null)
                return;
            $pdf = file_get_content('public/uploads/'.$user.getCv());

            header('Content-type: application/pdf');

            echo $pdf;
        }
    }

    private function isFileValid(array $file) : bool{
        if($file['size'] >= self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for uploading.';
            return false;
        }
        
        if(!isset($file['type']) && !in_array($file['type'], self::SIPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported.';
            return false;
        }

        return true;
    }


}