<?php

namespace FlashEvents\Controllers;


use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Users
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    
    public function getAll(Request $request, Response $response) {

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
}