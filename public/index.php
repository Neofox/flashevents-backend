<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 10/03/2017
 * Time: 14:03
 */

include_once __DIR__ . '/../vendor/autoload.php';
$configDir = __DIR__ . '/../config';

$app = new \Slim\App(include $configDir . '/config.php');

include_once $configDir . '/routes.php';
include_once $configDir . '/services.php';

$app->run();