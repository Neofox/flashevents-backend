<?php

use Slim\Container;

/** @var Container $container */
$container = $app->getContainer();

$container['em'] = function (Container $container) {
    $settings = $container->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

$container['service.serializer'] = function (Container $container) {
    return new \FlashEvents\Services\Serializer($container->get('em'));
};

//////// GATEWAY ////////
$container['gateway.user'] = function (Container $container) {

    $gateway = new \FlashEvents\Gateway\User();
    $gateway->setEm($container->get('em'));
    $gateway->setEntityClass(\FlashEvents\Entities\User::class);

    return $gateway;
};

$container['gateway.provider'] = function (Container $container) {

    $gateway = new \FlashEvents\Gateway\Provider();
    $gateway->setEm($container->get('em'));
    $gateway->setEntityClass(\FlashEvents\Entities\Provider::class);

    return $gateway;
};

$container['gateway.event'] = function (Container $container) {

    $gateway = new \FlashEvents\Gateway\Event();
    $gateway->setEm($container->get('em'));
    $gateway->setEntityClass(\FlashEvents\Entities\Event::class);

    return $gateway;
};

//////// MANAGER ////////
$container['manager.user'] = function (Container $container) {

    $manager = new \FlashEvents\Services\User();
    $manager->setGateway($container->get('gateway.user'));

    return $manager;
};

$container['manager.provider'] = function (Container $container) {

    $manager = new \FlashEvents\Services\Provider();
    $manager->setGateway($container->get('gateway.provider'));

    return $manager;
};

$container['manager.event'] = function (Container $container) {

    $manager = new \FlashEvents\Services\Event();
    $manager->setGateway($container->get('gateway.event'));

    return $manager;
};