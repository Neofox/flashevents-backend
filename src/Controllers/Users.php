<?php

namespace FlashEvents\Controllers;


use FlashEvents\Services\User;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Users
{
    /** @var ContainerInterface  */
    protected $container;

    /** @var User */
    protected $userManager;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->userManager = $container->get('manager.user');
    }
    
    public function getAll(Request $request, Response $response) {
        return $response->withJson($this->getUserManager()->findAll());
    }

    public function get(Request $request, Response $response) {

    }

    public function settings(Request $request, Response $response) {

    }

    public function getAllFriends(Request $request, Response $response) {

    }

    public function getFriend(Request $request, Response $response) {

    }

    public function addFriend(Request $request, Response $response) {

    }

    public function deleteFriend(Request $request, Response $response) {

    }

    public function getAllAddresses(Request $request, Response $response) {

    }

    public function getAddress(Request $request, Response $response) {

    }

    public function addAddress(Request $request, Response $response) {

    }

    public function deleteAddress(Request $request, Response $response) {

    }

    /**
     * @return User
     */
    public function getUserManager(): User
    {
        return $this->userManager;
    }

    /**
     * @param User $userManager
     *
     * @return $this
     */
    public function setUserManager(User $userManager)
    {
        $this->userManager = $userManager;

        return $this;
    }
}