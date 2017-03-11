<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 11/03/2017
 * Time: 15:03
 */

namespace FlashEvents\Entities;


class Provider
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Provider
     */
    public function setId(int $id): Provider
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
     * @return Provider
     */
    public function setName(string $name): Provider
    {
        $this->name = $name;
        return $this;
    }


}