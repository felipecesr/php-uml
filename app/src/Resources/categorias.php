<?php

use App\Controller\CategoriaController;

$categoriaController = new CategoriaController();

return [
    '/categorias' => [
        'GET' => [
            'controller' => $categoriaController,
            'action' => 'listar'
        ],
        'POST' => [
            'controller' => $categoriaController,
            'action' => 'create'
        ]
    ]
];
