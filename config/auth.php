<?php

return [

    'defaults' => [
        'guard' => 'api', // Definindo JWT como padrão
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 120, // Token expira em 120 minutos
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800, // Tempo para confirmar senha (3 horas)

];
