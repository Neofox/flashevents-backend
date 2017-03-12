<?php

use FlashEvents\Controllers\Events;
use FlashEvents\Controllers\Providers;
use FlashEvents\Controllers\Users;
use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/', function (Request $request, Response $response) {

    return $response->getBody()->write('Entre Vehbo et Anthony, ça sent pas la rose');
});

$app->get('/login',  Users::class . ':login');

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

$app->options('/{routes:.+}', function (Request $request, Response $response) {
    return $response;
});

$app->add(function (Request $req, Response $res, callable $next) {
    /** @var Response $response */
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

