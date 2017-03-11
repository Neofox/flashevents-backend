<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 10/03/2017
 * Time: 22:50
 */

namespace FlashEvents\Controllers;


use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Messages
{
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function getAll(Request $request, Response $response) {
        return $response->withJson(['messages' => [['id' => 1, 'text' => 'hello'], ['id' => 2, 'text' => 'all']]]);
    }

    public function get(Request $request, Response $response) {

        $id = $request->getAttribute('id');

        return $response->withJson(['id' => $id, 'text' => 'hello']);
        //$res = $response->withHeader('Content-Type', 'application/json');
        //return $res->getBody()->write(json_encode([]));

    }

    public function settings(Request $request, Response $response) {
        $settings = $this->container->get('settings')['test'];

        return $response->withJson([$settings, $this->container->get('service.test')->test()]);
    }
}