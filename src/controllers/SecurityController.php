<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{

    public function login()
    {
        $this->render('login');
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
        
        if($user->getPassword() !== $password)
            return $this->render('login', ['messages' => ['Incorrect password']]);
        
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
        //return $this->render('home');  
    }
}