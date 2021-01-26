<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Message.php';
require_once  __DIR__.'/../repository/MessagesRepository.php';


class MessagesController extends AppController
{
    //private $msgRepo;

    public function __construct()
    {
        parent::__construct();
        $this->msgRepo = new MessagesRepository();
    }

    public function messages()
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        
        session_start();

        $msgs = $this->msgRepo->getMessages(intval($_SESSION['id']), intval($_GET['recipient']));
        $this->render('messages', ['messages' => $msgs]);
    }

    public function announcementForm()
    {
        $this->handleAccess();
        if($this->hasExceedInactivityTime())              
            return header("Location: {$this->URL}/logout");
        $this->render('announcement-form');
    }
}