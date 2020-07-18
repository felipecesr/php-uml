<?php

use App\Controller\CategoriaController;
use Slim\App;

return function (App $app) {
    $app->get('/categorias', CategoriaController::class . ':list');
    $app->post('/categorias', CategoriaController::class . ':insert');
    $app->delete('/categorias/{id}', CategoriaController::class . ':remove');
};
