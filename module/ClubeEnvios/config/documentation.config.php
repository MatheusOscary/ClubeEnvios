<?php
return [
    'ClubeEnvios\\V1\\Rest\\User\\Controller' => [
        'collection' => [
            'POST' => [
                'request' => '{
   "name": "Nome completo do usuário",
   "login": "Nome de login único para o usuário",
   "password": "Senha que será utilizada na autenticação."
}',
                'response' => '{
  "message": "",
  "id": ""
}',
                'description' => 'Esse endpoint permite que você crie um novo usuário.',
            ],
        ],
    ],
];
