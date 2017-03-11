<?php

namespace FlashEvents\Entities;

use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tokens")
 */
class Token implements EntityInterface
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
    protected $token;

    /**
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="tokens")
     * @JoinColumn(name="id_provider", referencedColumnName="id")
     * @var Provider
     */
    protected $provider;

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @JoinColumn(name="id_user", referencedColumnName="id")
     * @var User
     */
    protected $user;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Token
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return Token
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param Provider $provider
     * @return Token
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Token
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}