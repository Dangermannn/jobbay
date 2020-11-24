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
        $this->render('main-page');
    }

    public function home(){
        $this->render('home');
    }

    public function job_listening(){
        $this->render('job-listening');
    }
}