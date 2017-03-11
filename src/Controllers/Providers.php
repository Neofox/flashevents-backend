<?php
/**
 * Created by PhpStorm.
 * User: roberto
 * Date: 11/03/2017
 * Time: 17:54
 */

namespace FlashEvents\Controllers;


use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Providers
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function getAll(Request $request, Response $response) {

    }
}