<?php

namespace FlashEvents\Controllers;

use FlashEvents\Services\Traits\ProviderManagerTrait;
use FlashEvents\Services\Traits\SerializerTrait;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Providers
{
    use ProviderManagerTrait;
    use SerializerTrait;

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->setProviderManager($container->get('manager.provider'));
        $this->setSerializer($container->get('service.serializer'));
    }

    public function getAll(Request $request, Response $response)
    {
        $providers = $this->providerManager->findAll();

        return $response->withJson($this->getSerializer()->serializeEntities($providers));
    }
}