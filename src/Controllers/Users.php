<?php

namespace FlashEvents\Controllers;


use FlashEvents\Entities\User;
use FlashEvents\Services\Traits\SerializerTrait;
use FlashEvents\Services\Traits\UserManagerTrait;
use ngfw\Recipe;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Users
{
    use UserManagerTrait;
    use SerializerTrait;

    /** @var ContainerInterface  */
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->setUserManager($container->get('manager.user'));
        $this->setSerializer($container->get('service.serializer'));
    }
    
    public function getAll(Request $request, Response $response) {
        $users = $this->getUserManager()->findAll();

        return $response->withJson($this->getSerializer()->serializeEntities($users));
    }

    public function get(Request $request, Response $response) {
        $id = $request->getAttribute('id');

        $user = $this->getUserManager()->find(['id' => $id]);

        return $response->withJson($this->getSerializer()->serializeEntities($user));
    }

    public function create(Request $request, Response $response)
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

    public function getAddress(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        $address = $this->getUserManager()->findAddress($id);

        return $response->withJson($this->getSerializer()->serialize($address));
    }

    public function updateAddress(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        $addressData = $request->getParam('address');

        /** @var User $user */
        $user = $this->getUserManager()->find(['id' => $id])[0];
        $address = $this->getUserManager()->hydrateAddress($addressData, $user->getAddress());

        $user->setAddress($address);

        return $response->withJson($this->getUserManager()->update($user));
    }

    public function deleteAddress(Request $request, Response $response) {

    }

}