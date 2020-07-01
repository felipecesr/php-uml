<?php

use App\Controller\CidadeController;

$routes = [
    '/cidades' => [
        'GET' => [
            'controller' => CidadeController::class,
            'action' => 'list'
        ]
    ]
];

return $routes;
