<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 10/03/2017
 * Time: 22:46
 */
return [
    'settings' => [
        'displayErrorDetails' => true,
        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    'src/Entities'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' =>  __DIR__.'/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver'   => 'pdo_mysql',
                'host'     => 'localhost',
                'dbname'   => 'flashevents',
                'user'     => 'root',
                'password' => null,
            ]
        ]
    ]
];