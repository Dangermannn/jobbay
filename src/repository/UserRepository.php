<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email) : ?User {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false)
            return null;

        return new User(
          $user['email'],
          null,
          $user['name'],
          $user['description'],
          $user['city']
        );
    }

    public function getUserForLogin(string $email) : ?User {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false)
            return null;

        return new User(
          $user['email'],
          $user['password_hash'],
          null,
          null,
          null,
        );
    }

    public function registerUser(string $email, string $name, string $city, string $password, string $description)
    {
        $statement = $this->database->connect()->prepare('
            INSERT INTO public.users (email,  name, city, password_hash, description)
            VALUES (?, ?, ?, ?, ?)
        ');

        $statement->execute([
            $email,
            $name,
            $city,
            password_hash($password, PASSWORD_DEFAULT),
            $description
        ]);
    }

    public function updateUser(string $password, string $city, string $description, string $cv_path)
    {
        //if($password == null && $city == null && $description == null && $cv_path == null)
        //    return;
        if(!isset($_SESSION))
            session_start();
        $st = "UPDATE public.users SET ";
        if($password != null)
        {
            if(strlen($password) < 8)
                return;
            $st."password='".$password."'";
        }

        if($city != null)
        {
            if(substr($st, -1) == "'")
                $st = $st.", "."city='".$city."'";
            else
                $st = $st."city='".$city."'";

        }

        if($description != null)
        {
            if(substr($st, -1) == "'")
                $st = $st.", "."description='".$description."'";
            else
                $st = $st."description='".$description."'";
                
        }
        
        if($cv_path != null)
        {   
            if(substr($st, -1) == "'")
                $st = $st.", "."cv_path='".$cv_path."'";
            else
                $st = $st."cv_path='".$cv_path."'";

        }

        $email = $_SESSION['email'];

        $statement = $this->database->connect()->prepare(
            $st." WHERE email='".$email."'"
        );

        $statement->execute();
    }
}