<?php

namespace FlashEvents\Controllers;


use FlashEvents\Services\UserManagerTrait;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Users
{
    use UserManagerTrait;

    /** @var ContainerInterface  */
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->setUserManager($container->get('manager.user'));
    }
    
    public function getAll(Request $request, Response $response) {
        return $response->withJson($this->getUserManager()->findAll());
    }

    public function get(Request $request, Response $response) {
        $id = $request->getAttribute('id');

        return $response->withJson($this->getUserManager()->find(['id' => $id]));
    }

    public function create (Request $request, Response $response)
    {
        $userData = $request->getParam('user');
        $user = $this->getUserManager()->hydrateUser($userData);

        return $response->withJson($this->getUserManager()->create($user));
    }

    public function getAllFriends(Request $request, Response $response) {
        $id = $request->getAttribute('id');

        return $response->withJson($this->getUserManager()->findFriends($id));

    }

    public function getFriend(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        $friendId = $request->getAttribute('friend');

        return $response->withJson($this->getUserManager()->findFriend($id, $friendId));
    }

    public function addFriend(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        $friendData = $request->getAttribute('friend');

        return $response->withJson($this->getUserManager()->addFriend($id, $friendData));

    }

    public function deleteFriend(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        $friendId = $request->getAttribute('friend');

        return $response->withJson($this->getUserManager()->removeFriend($id, $friendId));
    }

    public function getAllAddresses(Request $request, Response $response) {

    }

    public function getAddress(Request $request, Response $response) {

    }

    public function addAddress(Request $prequest, Response $response) {

    }

    public function deleteAddress(Request $request, Response $response) {

    }

}