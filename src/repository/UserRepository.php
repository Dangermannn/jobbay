<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{


    public function getUser(string $email) : ?User {
        $statement = $this->database->connect()->prepare('
            SELECT public.users.email, public.user_details.description, public.user_details.name,
                public.user_details.city, public.role.role
                FROM users
                    LEFT JOIN public.user_details
                        ON public.users.id_user_details = public.user_details.id
                    LEFT JOIN public.role
                        ON public.users.id_role = public.role.id
                WHERE public.users.email = :email
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
          $user['city'],
          $user['cv_path'],
          $user['id'],
          $user['role']
        );
    }

    public function getAllUsers()
    {
        $statement = $this->database->connect()->prepare('
        SELECT public.users.id, public.users.email, public.user_details.name,
            public.user_details.city, public.role.role FROM public.users
                LEFT JOIN public.user_details
                    ON public.user_details.id = public.users.id
                LEFT JOIN public.role
                    ON public.role.id = public.users.id_role;
        ');
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $user){
            $return[] = new User(
                $user['email'],
                null, 
                $user['name'], 
                null, 
                $user['city'], 
                null, 
                $user['id'],
                $user['role']
            );
        } 
        return $return;       
    }

    public function getUserForLogin(string $email) : ?User {
        $statement = $this->database->connect()->prepare('
            SELECT public.users.email, public.users.password_hash,
                public.users.id, public.role.role
                FROM public.users
                    LEFT JOIN public.role
                        ON public.role.id = public.users.id_role 
                WHERE email = :email
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
          null,
          $user['id'],
          $user['role']
        );
    }

    public function registerUser(string $email, string $name, string $city, string $password, string $description)
    {
            $this->database->connect()->beginTransaction();

            $statement = $this->database->connect()->prepare('
                INSERT INTO public.user_details (name, city, description)
                VALUES (?, ?, ?) RETURNING id
                '
            );

            $statement->execute([
               $name, $city, $description
            ]);

            $id = $statement->fetch(PDO::PARAM_STR);


            $statement = $this->database->connect()->prepare(
                '
                INSERT INTO public.users (email, password_hash, id_user_details, id_role)
                VALUES (?, ?, ?, ?)
                '
            );

            $statement->execute([$email, password_hash($password, PASSWORD_BCRYPT), $id['id'], 2]);
    }

    public function updateUser(string $password, string $city, string $description, string $cv_path)
    {
        if(!isset($_SESSION))
            session_start();

        $stUsers = "UPDATE public.users SET ";


        if($password != null)
        {
            if(strlen($password) < 8)
                return;
            $st."password='".$password."'";

            $statement = $this->database->connect()->prepare(
                $stUsers." WHERE email='".$email."'"
            );

            $statement->execute();
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

    public function removeUser(string $email)
    {
        $statement = $this->database->connect()->prepare('
            DELETE FROM public.users WHERE email = :email
        ');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
    }
}