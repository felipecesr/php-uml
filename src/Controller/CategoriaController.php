<?php

namespace App\Controller;

use App\Domain\Model\Categoria;
use App\Infra\Repository\CategoriaRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class CategoriaController
{
    private $categoriaRepository;

    public function __construct()
    {
        $this->categoriaRepository = new CategoriaRepository();
    }

    public function list(Request $request, Response $response): Response
    {
        $data = $this->categoriaRepository->allCategories();
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function insert(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $categoria = new Categoria(null, $data['name']);
        $this->categoriaRepository->insert($categoria);
        $response->getBody()->write(json_encode($categoria));
        return $response;
    }

    public function remove(Request $request, Response $response, $args): Response
    {
        $id = intval($args['id']);
        $this->categoriaRepository->remove($id);
        return $response;
    }
}
