<?php

require_once __DIR__.'/../models/User.php';

class Announcement{
    private $advertiser;
    private $title;
    private $description;
    private $localization;
    private $experience;
    private $appliers;

    public function __construct(
        User $advertiser,
        string $title,
        string $description,
        string $localization,
        int $experience,
        ?array $appliers
    ){
        $this->$advertiser = $advertiser;
        $this->title = $title;
        $this->description = $description;
        $this->localization = $localization;
        $this->experience = $experience;
        $this->appliers = $appliers;
    }

    public function getUser(): User{
        return $this->advertiser;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getLocalization(): string{
        return $this->localization;
    }

    public function getExperience(): int{
        return $this->experience;
    }
}