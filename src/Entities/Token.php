<?php

namespace FlashEvents\Entities;


class Token
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var Provider
     */
    protected $provider;

    /**
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