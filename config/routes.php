<?php

use App\Controller\CategoryController;
use Slim\App;

return function (App $app) {
    $app->get('/categorias', CategoryController::class . ':findAll');
    $app->get('/categorias/{id}', CategoryController::class . ':findById');
    $app->post('/categorias', CategoryController::class . ':insert');
    $app->delete('/categorias/{id}', CategoryController::class . ':remove');
};
