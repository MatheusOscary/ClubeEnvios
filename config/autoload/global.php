<?php
return [
    'api-tools-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'Database' => [
                'driver' => 'Pdo_Mysql',
                'hostname' => 'localhost',
                'database' => 'clubeenvios',
                'username' => 'root',
                'password' => '',
            ],
        ]
    ],
    'dependencies' => [
        'factories' => [
            ClubeEnvios\Validator\TokenValidator::class => function($container) {
                return new ClubeEnvios\Validator\TokenValidator();
            },
        ],
    ],
];

    