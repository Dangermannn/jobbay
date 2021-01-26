<?php

require_once __DIR__.'/../models/User.php';

class Message
{
    private $id;
    private $sender;
    private $recipient;
    private $content;
    private $isRead;
    private $dateRead;
    private $messageSent;
    private $senderDeleted;
    private $recipientDeleted;

    public function __construct($id, $sender, $recipient, $content, $isRead, $dateRead, $messageSent,
                                $senderDeleted, $recipientDeleted)
    {
        $this->id = $id;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->content = $content;
        $this->isRead = $isRead;
        $this->dateRead = $dateRead;
        $this->messageSent = $messageSent;
        $this->senderDeleted = $senderDeleted;
        $this->recipientDeleted = $recipientDeleted;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function setSender($sender): void
    {
        $this->sender = $sender;
    }

    public function getReceiver()
    {
        return $this->recipient;
    }

    public function setReceiver($recipient): void
    {
        $this->recipient = $recipient;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function setContent($content): void
    {
        $this->content = $content;
    }


    public function getIsRead()
    {
        return $this->isRead;
    }


    public function setIsRead($isRead): void
    {
        $this->isRead = $isRead;
    }


    public function getDateRead()
    {
        return $this->dateRead;
    }

    public function setDateRead($dateRead): void
    {
        $this->dateRead = $dateRead;
    }

    public function getMessageSent()
    {
        return $this->messageSent;
    }

    public function setMessageSent($messageSent): void
    {
        $this->messageSent = $messageSent;
    }

    public function getSenderDeleted()
    {
        return $this->senderDeleted;
    }

    public function setSenderDeleted($senderDeleted): void
    {
        $this->senderDeleted = $senderDeleted;
    }

    public function getRecipientDeleted()
    {
        return $this->recipientDeleted;
    }

    public function setRecipientDeleted($recipientDeleted): void
    {
        $this->recipientDeleted = $recipientDeleted;
    }

}