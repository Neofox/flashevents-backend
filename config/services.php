<?php

use Slim\Container;

/** @var Container $container */
$container = $app->getContainer();

$container['gateway.user'] = function (Container $container) {

    return new \FlashEvents\Gateway\User($container->get('em'));
};