<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    
    public function index(){
        // TODO display login.html\
        $this->render('login');
    }

    public function register(){
        // TODO display register.html
        $this->render('register');
    }

    public function main_page(){
        $this->render('main-page');
    }

    public function home(){
        $this->render('home');
    }
}