<?php

namespace FlashEvents\Controllers;

use FlashEvents\Services\Traits\ProviderManagerTrait;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Providers
{
    use ProviderManagerTrait;

    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->setProviderManager($container->get('manager.provider'));
    }

    public function getAll(Request $request, Response $response) {
        return $response->withJson($this->providerManager->findAll());
    }
}