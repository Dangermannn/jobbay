<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Message.php';

class MessagesRepository extends Repository
{
    public function insertNewMessage($id_sender, $id_recipient, $content)
    {
        $statement = $this->database->connect()->prepare('
            INSERT INTO public.messages (id_sender, id_recipient, content, is_read, date_read, message_sent, sender_deleted, recipient_deleted)
            VALUES (?, ?, ?, false, null, ?, false, false);
        ');

        $timestamp = date("Y-m-d H:i:s");

        $statement->execute([
            $id_sender,
            $id_recipient,
            $content,
            $timestamp = date("Y-m-d H:i:s"),
        ]);
    }

    public function removeMessage($id_message, $id_user, $is_sender)
    {
        // TODO: implement removing message
        $statement = $this->database->connect()->prepare('
            
        ');
    }

    public function getMessages($id_user, $id_recipient)
    {
        
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.messages
            WHERE (id_recipient = :id_user AND messages.recipient_deleted = false
                AND id_sender = :id_recipient)
            OR (id_recipient = :id_recipient AND id_sender = :id_user AND sender_deleted = false);
        ');
        

       $statement->bindParam(':id_user', $id_user, PDO::PARAM_INT);
       $statement->bindParam(':id_recipient', $id_recipient, PDO::PARAM_INT);

        $statement->execute();

        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($messages as $msg)
        {
            $return[] = new Message(
                $msg['id'],
                $msg['id_sender'],
                $msg['id_recipient'],
                $msg['content'],
                $msg['is_read'],
                $msg['date_read'] == null ? "" : $msg['date_read'],
                $msg['message_sent'],
                $msg['sender_deleted'],
                $msg['recipient_deleted']
            );
        }
        if(!isset($return))
            $return = [];
        return $return;
    }
}