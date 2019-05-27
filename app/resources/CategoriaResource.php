<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Domain\Categoria;

return function (App $app) {
    $app->get('/categorias', function (Request $request, Response $response) {
        $cat1 = new Categoria(1, 'Informatica');
        $cat2 = new Categoria(2, 'Escritorio');

        $lista = array();
        array_push($lista, $cat1, $cat2);

        $newResponse = $response->withJson($lista);

        return $newResponse;
    });
};
