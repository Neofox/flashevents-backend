<?php

use FlashEvents\Entities\Address;
use FlashEvents\Entities\Event;
use FlashEvents\Entities\Provider;
use FlashEvents\Entities\Token;
use FlashEvents\Entities\User;
use Slim\Http\Request;
use Slim\Http\Response;


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

        $this->group('/{id}/friends', function (){
            $this->get('[/]', User::class . ':getAllFriends');
            $this->get('/{id}', User::class . ':getFriend');
            $this->post('[/]', User::class . ':addFriend');
            $this->delete('[/]', User::class . ':deleteFriend');
        });

        $this->group('/{id}/addresses', function (){
            $this->get('[/]', User::class . ':getAllAddresses');
            $this->get('/{id}', User::class . ':getAddress');
            $this->post('[/]', User::class . ':addAddress');
            $this->delete('[/]', User::class . ':deleteAddress');
        });
    });

    $this->group('/events', function () {
        $this->get('[/]', Event::class . ':getAll');
        $this->get('/{id}', Event::class . ':get');
    });

    $this->group('/providers', function () {
        $this->get('[/]', Provider::class . ':getAll');
    });
});
