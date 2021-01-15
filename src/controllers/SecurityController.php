<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepo;

    public function __construct()
    {
        parent::__construct();
        $this->userRepo = new UserRepository();
    }

    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function loginUser()
    {
        if($_POST['action'] == 'register'){
            $this->register();
            return;
        }

        if(!$this->isPost())
            return $this->login('login');

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $this->userRepo->getUserForLogin($email);

        if(!$user)
            return $this->render('login', ['messages' => ['User with this email does not exist']]);
        
    
        if(!password_verify($password, $user->getPassword()))
            return $this->render('login', ['messages' => ['Incorrect password']]);
    
        session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["id"] = $user->getId();
        $_SESSION['role'] = $user->getRole();
        $url = "http://$_SERVER[HTTP_HOST]";

        if($user->getRole() === 'admin')
            return header("Location: {$url}/allUsers");
        return header("Location: {$url}/home");
    }

    public function registerUser(){

        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["profile-name"];
        $city = $_POST["city"];
        $description = $_POST["profile-description"];

        $user = $this->userRepo->getUser($email);
        if($user != null)
            return $this->render('register', ['messages' => ["Account with that email already exists"]]);
        
        $this->userRepo->registerUser($email, $name, $city, $password, $description);

        $this->render('login', ['messages' => ['Account has been created successfully!']]);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->render('login', ['messages' => ['You have been logout successfully!']]);
    }
}