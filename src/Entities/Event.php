<?php

namespace FlashEvents\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use FlashEvents\Controllers\events;

/**
 * @ORM\Entity
 * @ORM\Table(name="events")
 */
class Event implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Provider")
     * @JoinColumn(name="id_provider", referencedColumnName="id")
     * @var ArrayCollection
     */
    protected $providers;

    /**
     * @ORM\OneToOne(targetEntity="Address")
     * @JoinColumn(name="id_address", referencedColumnName="id")
     * @var Address
     */
    protected $address;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $endDate;

    /**
     * @ORM\Column(type="string")
     * @var float
     */
    protected $cost;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $eventLink;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $category;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $picture;

    /**
     * @ORM\Column(type="integer")
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
     * @return ArrayCollection
     */
    public function getProvider(): ArrayCollection
    {
        return $this->providers;
    }

    /**
     * @param Provider $provider
     * @return Event
     */
    public function addProvider(Provider $provider): Event
    {
        $this->providers[] = $provider;

        return $this;
    }

    /**
     * @param Provider $provider
     * @return Event
     */
    public function removeProvider(Provider $provider): Event
    {
        $this->providers->removeElement($provider);

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Event
     */
    public function setAddress(Address $address): Event
    {
        $this->address = $address;
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
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category)
    {
        $this->category = $category;
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