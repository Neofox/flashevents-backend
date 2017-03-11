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

        $this->get('/settings', Messages::class . ':settings');
        $this->get('/{id}', Messages::class . ':get');
        $this->get('[/]', Messages::class . ':getAll');

    });
});

$app->get('/sfjkhr/sefe/sdvgrdv', function( Request $request, Response $response) {
    $this->get('dlfkjfdfjk');
    $response->getBody()->write('coucou');
});

$app->get('/users', function (Request $request, Response $response) {

    return $response->withJson([], 401);
});

$app->get('/users/{id}', function (Request $request, Response $response) {

    /** @var \Slim\Route $route */
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');

    $something  = $request->getAttributes();

    $res = $response->withHeader('Content-Type', 'application/json');
    $res = $res->withJson([$id, $request->getAttribute('id'), $something]);

    return $res;
});
