<?php

use FlashEvents\Controllers\Messages;
use Slim\Http\Request;
use Slim\Http\Response;
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/', function (Request $request, Response $response) {

    \ngfw\Recipe::debug($this);

    return $response;
});

$app->group('/api', function () {

    $this->group('/messages', function () {

        $this->get('/{id}', Messages::class . ':get');
        $this->get('[/]', Messages::class . ':getAll');

        $this->post('[/]', Messages::class . 'create');
    });
});