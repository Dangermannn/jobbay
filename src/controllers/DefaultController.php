<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    
    public function login(){
        $this->render('login');
    }

    public function register(){
        $this->render('register');
    }

    public function main_page(){
        handleSession();
        $this->render('main-page');
    }

    public function home(){
        handleSession();
        $this->render('home');
    }

    public function searchJob(){
        handleSession();
        $this->render('jobListening');
    }

    public function handleSession()
    {
        session_start();
        if($_SESSION["loggedIn" != true]){
            echo("Access denied!");
            exit();
        }
    }

}