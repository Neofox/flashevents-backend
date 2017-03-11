`<?php

use FlashEvents\Controllers\Messages;
use FlashEvents\Entities\Address;
use FlashEvents\Entities\Event;
use FlashEvents\Entities\Provider;
use FlashEvents\Entities\Token;
use FlashEvents\Entities\User;
use Slim\Http\Request;
use Slim\Http\Response;
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/', function (Request $request, Response $response) {

    \ngfw\Recipe::debug($this);

    return $response;
});

$app->group('/api', function () {
    $this->group('/users', function () {
        $this->get('[/]', User::class . ':getAll');
        $this->get('/{id}', User::class . ':get');
        $this->put('/{id}', User::class . ':update');
        $this->post('[/]', User::class . ':create');
        $this->delete('/{id}', User::class . ':delete');
    });

    $this->group('/users/{id}/friends', function (){
        $this->get('[/]', User::class . ':getAllFriends');
        $this->get('/{id}', User::class . ':getFriend');
        $this->post('[/]', User::class . ':addFriend');
        $this->delete('[/]', User::class . ':deleteFriend');
    });

    $this->group('/users/{id}/addresses', function (){
        $this->get('[/]', User::class . ':getAllAddresses');
        $this->get('/{id}', User::class . ':getAddress');
        $this->post('[/]', User::class . ':addAddress');
        $this->delete('[/]', User::class . ':deleteAddress');
    });

    $this->group('/addresses', function () {
        $this->get('[/]', Address::class . ':getAll');
        $this->get('/{id}', Address::class . ':get');
        $this->put('/{id}', Address::class . ':update');
        $this->post('[/]', Address::class . ':create');
        $this->delete('/{id}', Address::class . ':delete');
    });

    $this->group('/events', function () {
        $this->get('[/]', Event::class . ':getAll');
        $this->get('/{id}', Event::class . ':get');
        $this->put('/{id}', Event::class . ':update');
        $this->post('[/]', Event::class . ':create');
        $this->delete('/{id}', Event::class . ':delete');
    });

    $this->group('/providers', function () {
        $this->get('[/]', Provider::class . ':getAll');
        $this->get('/{id}', Provider::class . ':get');
        $this->put('/{id}', Provider::class . ':update');
        $this->post('[/]', Provider::class . ':create');
        $this->delete('/{id}', Provider::class . ':delete');
    });

    $this->group('/tokens', function () {
        $this->get('[/]', Token::class . ':getAll');
        $this->get('/{id}', Token::class . ':get');
        $this->put('/{id}', Token::class . ':update');
        $this->post('[/]', Token::class . ':create');
        $this->delete('/{id}', Token::class . ':delete');
    });
});
