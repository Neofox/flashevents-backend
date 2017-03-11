<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 11/03/2017
 * Time: 17:51
 */

namespace FlashEvents\Controllers;


use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class events
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function getAll(Request $request, Response $response) {

    }

    public function get(Request $request, Response $response) {

    }
}