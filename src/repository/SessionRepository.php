<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class SessionRepository extends Repository
{
    public function insertNewSession($sessionId, $idUser)
    {
        $statement = $this->database->connect()->prepare('
            INSERT INTO public.sessions (session_id, id_user, last_action, logged_in)
            VALUES (?, ?, ?, ?)
        ');

        $timestamp = date("Y-m-d H:i:s");

        $statement->execute([
            $sessionId,
            $idUser,
            $timestamp = date("Y-m-d H:i:s"),
            'true'
        ]);
    
    }

    public function updateSession($sessionId, $idUser, $loggedIn)
    {
        $statement = $this->database->connect()->prepare('
            UPDATE public.sessions SET last_action = ?, logged_in = ?
            WHERE id_user = ? AND session_id = ?
        ');

        $statement->execute([
            $timestamp = date("Y-m-d H:i:s"),
            $loggedIn,
            $idUser,
            $sessionId
        ]);
    }
}