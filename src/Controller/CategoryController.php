<?php

namespace App\Controller;

use App\Domain\Model\Category;
use App\Domain\Repository\ICategoryRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface  as Request;

class CategoryController
{
    private $repository;

    public function __construct(ICategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll(Request $request, Response $response): Response
    {
        $data = $this->repository->allCategories();
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findById(Request $request, Response $response, $args): Response
    {
        $data = $this->repository->findById($args['id']);
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function insert(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $category = new Category(null, $data['name']);
        $this->repository->insert($category);
        $response->getBody()->write(json_encode($category));
        return $response;
    }

    public function remove(Request $request, Response $response, $args): Response
    {
        $id = intval($args['id']);
        $this->repository->remove($id);
        return $response;
    }
}
