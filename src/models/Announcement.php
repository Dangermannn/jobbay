<?php

require_once __DIR__.'/../models/User.php';

class Announcement
{
    private $id;
    private $advertiser;
    private $title;
    private $description;
    private $localization;
    private $experience;
    private $appliers;
    private $added;

    /*
    public function __construct(
        User $advertiser,
        string $title,
        string $description,
        string $localization,
        int $experience,
        array $appliers = []
    ){
        $this->advertiser = $advertiser;
        $this->title = $title;
        $this->description = $description;
        $this->localization = $localization;
        $this->experience = $experience;
        $this->appliers = $appliers;
    }
*/
    public function __construct(
        string $title,
        string $description,
        string $localization,
        int $experience,
        string $added,
        int $id = null,
        ?string $advertiser = null  
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->localization = $localization;
        $this->experience = $experience;
        $this->added = $added;
        if($id != null)
            $this->id = $id;
        if($advertiser != null)
            $this->advertiser = $advertiser;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAdded(): string
    {
        return $this->added;
    }

    public function setAdded(string $added): void
    {
        $this->added = $added;
    }

    public function getUser(): User{

        return $this->advertiser;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLocalization(): string
    {
        return $this->localization;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }
    public function getAdvertiser()
    {
        return $this->advertiser;
    }

    public function setAdvertiser($advertiser): void
    {
        $this->advertiser = $advertiser;
    }

    public function getAppliers()
    {
        return $this->appliers;
    }

    public function setAppliers($appliers): void
    {
        $this->appliers = $appliers;
    }
}