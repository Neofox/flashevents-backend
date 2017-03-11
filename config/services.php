<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 10/03/2017
 * Time: 23:10
 */
use Slim\Container;

/** @var Container $container */
$container = $app->getContainer();


$container['service.test'] = function (Container $container) {
    $test = new \FlashEvents\Services\Test();

    return $test;
};