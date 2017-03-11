<?php

namespace FlashEvents\Entities;

class Event
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Provider
     */
    protected $idProvider;

    /**
     * @var Address
     */
    protected $idAddress;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @var float
     */
    protected $cost;

    /**
     * @var string
     */
    protected $eventLink;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $picture;

    /**
     * @var int
     */
    protected $rating;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Event
     */
    public function setId(int $id): Event
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Event
     */
    public function setName(string $name): Event
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Provider
     */
    public function getIdProvider(): Provider
    {
        return $this->idProvider;
    }

    /**
     * @param Provider $idProvider
     * @return Event
     */
    public function setIdProvider(Provider $idProvider): Event
    {
        $this->idProvider = $idProvider;
        return $this;
    }

    /**
     * @return Address
     */
    public function getIdAddress(): Address
    {
        return $this->idAddress;
    }

    /**
     * @param Address $idAddress
     * @return Event
     */
    public function setIdAddress(Address $idAddress): Event
    {
        $this->idAddress = $idAddress;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime|string $startDate
     * @return Event
     */
    public function setStartDate($startDate): Event
    {
        if(is_string($startDate)){
            $startDate = new \DateTime($startDate);
        }

        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime|string $endDate
     * @return Event
     */
    public function setEndDate($endDate): Event
    {
        if(is_string($endDate)){
            $endDate = new \DateTime($endDate);
        }

        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     * @return Event
     */
    public function setCost(float $cost): Event
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventLink(): string
    {
        return $this->eventLink;
    }

    /**
     * @param string $eventLink
     * @return Event
     */
    public function setEventLink(string $eventLink): Event
    {
        $this->eventLink = $eventLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Event
     */
    public function setDescription(string $description): Event
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     * @return Event
     */
    public function setPicture(string $picture): Event
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     * @return Event
     */
    public function setRating(int $rating): Event
    {
        $this->rating = $rating;
        return $this;
    }
}