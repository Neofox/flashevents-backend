<?php

namespace FlashEvents\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use FlashEvents\Controllers\Users;
use ngfw\Recipe;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements EntityInterface
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
    protected $fisrtName;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $lastName;

    /**
     * @ORM\OneToOne(targetEntity="Address", cascade={"persist"})
     * @JoinColumn(name="id_address", referencedColumnName="id")
     * @var Address
     */
    protected $address;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $password;

    /**
     * @ManyToMany(targetEntity="User")
     * @var ArrayCollection
     */
    protected $friends;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->friends = new ArrayCollection();
    }


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
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return User
     */
    public function setAddress(Address $address): User
    {
        $this->address = $address;
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
        return Recipe::simpleDecode($this->password);
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = Recipe::simpleEncode($password);
        return $this;
    }

    /**
     * @param User $friend
     * @return User
     */
    public function addFriend(User $friend): User
    {
        $this->friends[] = $friend;

        return $this;
    }

    /**
     * @param User $friend
     * @return User
     */
    public function removeFriend(User $friend): User
    {
        $this->friends->removeElement($friend);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getFriends(): ArrayCollection
    {
        return $this->friends;
    }
}