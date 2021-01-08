<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';
require_once __DIR__.'/../repository/UserRepository.php';

class AccountController extends AppController{

    private const MAX_FILE_SIZE = 3000 * 3000;
    private const SUPPORTED_TYPES = ['application/pdf'];
    private const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function accountDetails(){
        session_start();
        if($_SESSION["loggedIn"] != true) {
            echo("Access denied!");
            exit();
        }
        $this->render('account-details');
    }

    public function accountSettings(){
        session_start();
        if($_SESSION["loggedIn"] != true) {
            echo("Access denied!");
            exit();
        }
        $this->render('account-settings');
    }


    public function accountInfo(){
        $repo = new UserRepository();
        $user = $repo->getUser($_GET['email']);
        $this->render('user-info', ['data' => $user]);
    }


    public function updateAccount(){
        $userRepository = new UserRepository();

        $password = $_POST["password"];

        if($password != $_POST["confirm-password"])
            return $this->render('account-settings', ['Passwords does not match!']);


        $city = $_POST["city"];
        $description = $_POST["profile-description"];

        $userRepository->updateUser($password, $city, $description, $_FILES['file']['tmp_name']);
        if(is_uploaded_file($_FILES['file']['tmp_name']) && $this->isFileValid($_FILES['file'])){
            
            move_uploaded_file(
                $_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            array_push($messages, 'Updated account successfully!');
            return $this->render('account-settings', ['messages' => [$this->messages]]);
        }
        return $this->render('account-details', ['messages' => $this->messages]);
    }

    public function getCv()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json"){
            $email = trim(file_get_contents("php://input"));
            $decodedEmail = json_decode($email, false);
            print_r($decodedEmail);
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