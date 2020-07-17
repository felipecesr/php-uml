<?php

use App\Controller\CategoriaController;

$routes = [
    '/categorias' => [
        'GET' => [
            'controller' => CategoriaController::class,
            'action'     => 'list'
        ],
        'POST' => [
            'controller' => CategoriaController::class,
            'action'     => 'insert'
        ],
        'DELETE' => [
            'controller' => CategoriaController::class,
            'action'     => 'remove'
        ]
    ]
];

return $routes;
