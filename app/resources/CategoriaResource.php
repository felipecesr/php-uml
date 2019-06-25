<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Services\CategoriaService;

return function (App $app) {
    $app->get('/categorias/{id}', function (Request $request, Response $response, $args) {
        $service = new CategoriaService();
        $obj = $service->buscar($args['id']);

        $newResponse = $response->withJson($obj);
        return $newResponse;
    });
};
