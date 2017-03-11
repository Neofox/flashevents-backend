<?php

namespace FlashEvents\Entities;


class Address
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

}