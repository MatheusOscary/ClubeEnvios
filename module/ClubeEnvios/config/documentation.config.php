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
    'ClubeEnvios\\V1\\Rest\\Auth\\Controller' => [
        'collection' => [
            'POST' => [
                'request' => '{
   "login": "Nome de login único por usuário.",
   "password": "Senha utilizada para autenticação do usuário."
}',
                'response' => '{
    "access_token": "",
    "expires_in": "2024-10-22 14:30:00"
}',
                'description' => 'Este endpoint permite que os usuários se autentiquem fornecendo suas credenciais de login.',
            ],
        ],
    ],
];
