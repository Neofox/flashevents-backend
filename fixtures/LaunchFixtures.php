<?php

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use FlashEvents\DataFixtures\UserFixtureLoader;


require __DIR__ . '/../vendor/autoload.php';


$settings =  include __DIR__ . '/../config/config.php';
$settings = $settings['settings']['doctrine'];

$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $settings['meta']['entity_path'],
    $settings['meta']['auto_generate_proxies'],
    $settings['meta']['proxy_dir'],
    $settings['meta']['cache'],
    false
);

$em = \Doctrine\ORM\EntityManager::create($settings['connection'], $config);

$loader = new Loader();
$loader->addFixture(new UserFixtureLoader());
$purger = new ORMPurger();
$executor = new ORMExecutor($em, $purger);
$executor->execute($loader->getFixtures());