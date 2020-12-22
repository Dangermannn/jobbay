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
          $user['password_hash'],
          $user['name']
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
}