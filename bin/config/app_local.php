<?php
use function Cake\Core\env;

return [
    'debug' => true,

    'Security' => [
        // conserva tu salt actual
        'salt' => env('SECURITY_SALT', '1d08363f5a65acc322a6b1414696a8831b55225fa62deff8ef8e4eee42f1d1d3'),
    ],

    'Datasources' => [
        'default' => [
            'className' => \Cake\Database\Connection::class,
            'driver' => \Cake\Database\Driver\Mysql::class,
            'host' => 'localhost',
            // 'port' => 3306, // descomenta y ajusta si usas puerto distinto (XAMPP/MAMP)
              'username' => 'examenes_usr',
    'password' => 'Tu_Clave_Segura',
    'database' => 'examenes_db',
            'encoding' => 'utf8mb4',
            'timezone' => 'UTC',
            'cacheMetadata' => true,
            'log' => true,
            'url' => env('DATABASE_URL', null),
        ],
    ],

    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
