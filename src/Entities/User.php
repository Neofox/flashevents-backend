<?php

namespace FlashEvents\Entities;


class User
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $fisrtName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var Address
     */
    protected $idAddress;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFisrtName(): string
    {
        return $this->fisrtName;
    }

    /**
     * @param string $fisrtName
     * @return User
     */
    public function setFisrtName(string $fisrtName): User
    {
        $this->fisrtName = $fisrtName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
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
     * @return User
     */
    public function setIdAddress(Address $idAddress): User
    {
        $this->idAddress = $idAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }
}