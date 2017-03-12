<?php

namespace FlashEvents\Controllers;


use FlashEvents\Services\Traits\EventManagerTrait;
use FlashEvents\Services\Traits\SerializerTrait;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Events
{
    use EventManagerTrait;
    use SerializerTrait;

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->setEventManager($container->get('manager.event'));
        $this->setSerializer($container->get('service.serializer'));
    }

    public function getAll(Request $request, Response $response)
    {
        $event = $this->getEventManager()->findAll();

        return $response->withJson($this->getSerializer()->serializeEntities($event));
    }

    public function get(Request $request, Response $response)
    {
        $id = $request->getAttribute('id');
        $event = $this->getEventManager()->find(['id' => $id]);

        return $response->withJson($this->getSerializer()->serializeEntities($event));
    }
}