<?php

use FlashEvents\Controllers\Events;
use FlashEvents\Controllers\Providers;
use FlashEvents\Controllers\Users;
use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/', function (Request $request, Response $response) {

    \ngfw\Recipe::debug($this);

    return $response;
});

$app->group('/api', function () {
    $this->group('/users', function () {
        $this->get('[/]', Users::class . ':getAll');
        $this->get('/{id}', Users::class . ':get');
        $this->put('/{id}', Users::class . ':update');
        $this->post('[/]', Users::class . ':create');
        $this->delete('/{id}', Users::class . ':delete');

        $this->group('/{id}/friends', function (){
            $this->get('[/]', Users::class . ':getAllFriends');
            $this->get('/{friend}', Users::class . ':getFriend');
            $this->post('[/]', Users::class . ':addFriend');
            $this->delete('[/]', Users::class . ':deleteFriend');
        });

        $this->group('/{id}/addresses', function (){
            $this->get('[/]', Users::class . ':getAddress');
            $this->put('[/]', Users::class . ':updateAddress');
        });
    });

    $this->group('/events', function () {
        $this->get('[/]', Events::class . ':getAll');
        $this->get('/{id}', Events::class . ':get');
    });

    $this->group('/providers', function () {
        $this->get('[/]', Providers::class . ':getAll');
    });
});
