<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Announcement.php';

class AccountController extends AppController{

    private const MAX_FILE_SIZE = 3000 * 3000;
    private const SUPPORTED_TYPES = ['application/pdf'];
    private const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function accountDetails(){
        $this->render('account-details');
    }

    public function accountSettings(){
        $this->render('account-settings');
    }


    public function updateAccount(){
        if(is_uploaded_file($_FILES['file']['tmp_name']) && $this->isFileValid($_FILES['file'])){
            
            move_uploaded_file(
                $_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            array_push($messages, 'Updated account successfully!');
            return $this->render('account-settings', ['messages' => [$this->messages]]);
        }
        return $this->render('account-details', ['messages' => $this->messages]);
    }

    public function isFileValid(array $file) : bool{
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