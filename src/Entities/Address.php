<?php

namespace FlashEvents\Entities;


class Adress
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @var string
     */
    protected $streetName;

    /**
     * @var string
     */
    protected $streetNumber;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Adresses
     */
    public function setId(int $id): Adresses
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Adresses
     */
    public function setCity(string $city): Adresses
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     * @return Adresses
     */
    public function setZipCode(string $zipCode): Adresses
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName(): string
    {
        return $this->streetName;
    }

    /**
     * @param string $streetName
     * @return Adresses
     */
    public function setStreetName(string $streetName): Adresses
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumber(): string
    {
        return $this->streetNumber;
    }

    /**
     * @param string $streetNumber
     * @return Adresses
     */
    public function setStreetNumber(string $streetNumber): Adresses
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Adresses
     */
    public function setLongitude(float $longitude): Adresses
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Adresses
     */
    public function setLatitude(float $latitude): Adresses
    {
        $this->latitude = $latitude;
        return $this;
    }
}