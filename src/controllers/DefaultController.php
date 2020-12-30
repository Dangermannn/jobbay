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
        session_start();
        if($_SESSION["loggedIn"] != true) {
            echo("Access denied!");
            exit();
        }
        $this->render('main-page');
    }

    public function home(){
        session_start();
        if($_SESSION["loggedIn"] != true) {
            echo("Access denied!");
            exit();
        }
        $this->render('home');
    }

}