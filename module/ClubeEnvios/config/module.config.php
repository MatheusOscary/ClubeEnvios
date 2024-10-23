<?php
return [
    'service_manager' => [
        'factories' => [
            \ClubeEnvios\V1\Rest\Auth\AuthResource::class => \ClubeEnvios\V1\Rest\Auth\AuthResourceFactory::class,
            \ClubeEnvios\V1\Rest\User\UserResource::class => \ClubeEnvios\V1\Rest\User\UserResourceFactory::class,
            \ClubeEnvios\V1\Rest\Cotacao\CotacaoResource::class => \ClubeEnvios\V1\Rest\Cotacao\CotacaoResourceFactory::class,
            'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\CotacaoServicosResource' => 'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\CotacaoServicosResourceFactory',
        ],
    ],
    'router' => [
        'routes' => [
            'clube-envios.rest.auth' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/auth[/:auth_id]',
                    'defaults' => [
                        'controller' => 'ClubeEnvios\\V1\\Rest\\Auth\\Controller',
                    ],
                ],
            ],
            'clube-envios.rest.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'ClubeEnvios\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
            'clube-envios.rest.cotacao' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/cotacao[/:cotacao_id]',
                    'defaults' => [
                        'controller' => 'ClubeEnvios\\V1\\Rest\\Cotacao\\Controller',
                    ],
                ],
            ],
            'clube-envios.rest.cotacao-servicos' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/cotacao-servicos[/:cotacao_servicos_id]',
                    'defaults' => [
                        'controller' => 'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'clube-envios.rest.auth',
            1 => 'clube-envios.rest.user',
            2 => 'clube-envios.rest.cotacao',
            3 => 'clube-envios.rest.cotacao-servicos',
        ],
    ],
    'api-tools-rest' => [
        'ClubeEnvios\\V1\\Rest\\Auth\\Controller' => [
            'listener' => \ClubeEnvios\V1\Rest\Auth\AuthResource::class,
            'route_name' => 'clube-envios.rest.auth',
            'route_identifier_name' => 'auth_id',
            'collection_name' => 'auth',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ClubeEnvios\V1\Rest\Auth\AuthEntity::class,
            'collection_class' => \ClubeEnvios\V1\Rest\Auth\AuthCollection::class,
            'service_name' => 'Auth',
        ],
        'ClubeEnvios\\V1\\Rest\\User\\Controller' => [
            'listener' => \ClubeEnvios\V1\Rest\User\UserResource::class,
            'route_name' => 'clube-envios.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ClubeEnvios\V1\Rest\User\UserEntity::class,
            'collection_class' => \ClubeEnvios\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
        'ClubeEnvios\\V1\\Rest\\Cotacao\\Controller' => [
            'listener' => \ClubeEnvios\V1\Rest\Cotacao\CotacaoResource::class,
            'route_name' => 'clube-envios.rest.cotacao',
            'route_identifier_name' => 'cotacao_id',
            'collection_name' => 'cotacao',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'POST',
                1 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ClubeEnvios\V1\Rest\Cotacao\CotacaoEntity::class,
            'collection_class' => \ClubeEnvios\V1\Rest\Cotacao\CotacaoCollection::class,
            'service_name' => 'Cotacao',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'ClubeEnvios\\V1\\Rest\\Auth\\Controller' => 'Json',
            'ClubeEnvios\\V1\\Rest\\User\\Controller' => 'Json',
            'ClubeEnvios\\V1\\Rest\\Cotacao\\Controller' => 'Json',
            'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'ClubeEnvios\\V1\\Rest\\Auth\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
            'ClubeEnvios\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
            'ClubeEnvios\\V1\\Rest\\Cotacao\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
            'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'ClubeEnvios\\V1\\Rest\\Auth\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
            'ClubeEnvios\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
            'ClubeEnvios\\V1\\Rest\\Cotacao\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
            'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\Controller' => [
                0 => 'application/vnd.clube-envios.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \ClubeEnvios\V1\Rest\Auth\AuthEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'clube-envios.rest.auth',
                'route_identifier_name' => 'auth_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \ClubeEnvios\V1\Rest\Auth\AuthCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'clube-envios.rest.auth',
                'route_identifier_name' => 'auth_id',
                'is_collection' => true,
            ],
            \ClubeEnvios\V1\Rest\User\UserEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'clube-envios.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \ClubeEnvios\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'clube-envios.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ],
            \ClubeEnvios\V1\Rest\Cotacao\CotacaoEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'clube-envios.rest.cotacao',
                'route_identifier_name' => 'cotacao_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \ClubeEnvios\V1\Rest\Cotacao\CotacaoCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'clube-envios.rest.cotacao',
                'route_identifier_name' => 'cotacao_id',
                'is_collection' => true,
            ],
            'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\CotacaoServicosEntity' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'clube-envios.rest.cotacao-servicos',
                'route_identifier_name' => 'cotacao_servicos_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'ClubeEnvios\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'ClubeEnvios\\V1\\Rest\\User\\Validator',
        ],
        'ClubeEnvios\\V1\\Rest\\Auth\\Controller' => [
            'input_filter' => 'ClubeEnvios\\V1\\Rest\\Auth\\Validator',
        ],
        'ClubeEnvios\\V1\\Rest\\Cotacao\\Controller' => [
            'input_filter' => 'ClubeEnvios\\V1\\Rest\\Cotacao\\Validator',
        ],
        'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\Controller' => [
            'input_filter' => 'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'ClubeEnvios\\V1\\Rest\\User\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'max' => '128',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'name',
                'description' => 'Nome completo do usuário',
                'field_type' => 'string',
                'error_message' => 'O campo name está preenchido incorretamente, o tamanho máximo é de 128 caracteres.',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'max' => '32',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'login',
                'description' => 'Nome de login único para o usuário',
                'field_type' => 'string',
                'error_message' => 'O campo login está preenchido incorretamente, o tamanho máximo é de 32 caracteres.',
                'allow_empty' => false,
            ],
            2 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'password',
                'description' => 'Senha que será utilizada na autenticação.',
                'field_type' => 'string',
                'error_message' => 'O campo senha é obrigatório',
            ],
        ],
        'ClubeEnvios\\V1\\Rest\\Auth\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'login',
                'description' => 'Nome de login único por usuário.',
                'field_type' => 'string',
                'error_message' => 'O campo login é obrigatório.',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'password',
                'description' => 'Senha utilizada para autenticação do usuário.',
                'field_type' => 'string',
                'error_message' => 'O campo password é obrigatório.',
            ],
        ],
        'ClubeEnvios\\V1\\Rest\\Cotacao\\Validator' => [],
        'ClubeEnvios\\V1\\Rest\\CotacaoServicos\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'servico',
                'description' => 'Nome do serviço de cotação.',
                'field_type' => 'string',
                'error_message' => 'O campo servico é obrigatório.',
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'ClubeEnvios\\V1\\Rest\\User\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
            'ClubeEnvios\\V1\\Rest\\Cotacao\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
