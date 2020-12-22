<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{

    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function loginUser(){

        $userRepository = new UserRepository();

        if($this->isPost())
            return $this->login('login');

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user)
            return $this->render('login', ['messages' => ['User with this email does not exist']]);
        
       // if($user->getPassword() !== $password)
         //   return $this->render('login', ['messages' => ['Incorrect password']]);
        if(!password_verify($password, $user->getPassword()))
            return $this->render('login', ['messages' => ['Incorrect password']]);
        

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
        //return $this->render('home');  
    }

    public function registerUser(){
        $userRepository = new UserRepository();
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["profile-name"];
        $city = $_POST["city"];
        $description = $_POST["profile-description"];

        $user = $userRepository->getUser($email);
        if($user != null)
            return $this->render('register', ['messages' => ["Account with that email already exists"]]);
        
        $userRepository->registerUser($email, $name, $city, $password, $description);

        $this->render('login', ['messages' => ['Account has been created successfully!']]);
    }
}