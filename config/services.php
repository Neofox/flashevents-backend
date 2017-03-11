<?php

use Slim\Container;

/** @var Container $container */
$container = $app->getContainer();

//////// GATEWAY ////////
$container['gateway.user'] = function (Container $container) {

    $gateway = new \FlashEvents\Gateway\User();
    $gateway->setEm($container->get('em'));
    $gateway->setEntityClass(\FlashEvents\Entities\User::class);

    return $gateway;
};

//////// MANAGER ////////
$container['manager.user'] = function (Container $container) {

    $manager = new \FlashEvents\Services\User();
    $manager->setGateway($container->get('gateway.user'));

    return $manager;
};