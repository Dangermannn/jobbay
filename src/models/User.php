<?php

class User {
    private $id;
    private $email;
    private $password;
    private $name;
    private $cv;
    private $description;
    private $city;
    private $role;
    public function __construct(
        string $email,
        ?string $password,
        ?string $name,
        ?string $description,
        ?string $city,
        ?string $cv,
        ?string $id,
        ?string $role
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->description = $description;
        $this->city = $city;
        $this->cv = $cv;
        $this->id = $id;
        $this->role = $role;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
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