<?php

use Controller\CategoriaController;

require __DIR__ . '/../vendor/autoload.php';

header('Content-type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_URI'] === '/categorias' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new CategoriaController();
    $result = $controller->listar();
    echo json_encode($result);
}