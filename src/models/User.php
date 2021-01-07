<?php

class User {
    private $email;
    private $password;
    private $name;
    private $cv;
    private $description;
    private $city;
    public function __construct(
        string $email,
        ?string $password,
        ?string $name,
        ?string $description,
        ?string $city,
        ?string $cv
    ) {
        $this->email = $email;
        if($password != null)
            $this->password = $password;
        $this->name = $name;
        $this->description = $description;
        $this->city = $city;
        if($cv != null)
            $this->cv = $cv;
    }

    public function getCv()
    {
        return $this->cv;
    }

    public function setCv($cv): void
    {
        $this->cv = $cv;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getName(): string{
        return $this->name;
    }
}