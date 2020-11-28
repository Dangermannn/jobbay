<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';

class AccountController extends AppController{

    public function accountSettings(){
        $this->render('account-settings');
    }

}