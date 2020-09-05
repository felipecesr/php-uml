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
        $category = $this->repository->findById($args['id']);
        $payload = json_encode($category);

        $status = (is_null($category)) ? 204 : 200;

        $response->getBody()->write($payload);
        return $response
                 ->withHeader('Content-Type', 'application/json')
                 ->withStatus($status);
    }

    public function insert(Request $request, Response $response): Response
    {
        $requestBody = $request->getParsedBody();
        $category = new Category(null, $requestBody['name']);
        $payload = json_encode($category);

        $this->repository->insert($category);

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, $args): Response
    {
        $requestBody = $request->getParsedBody();

        $category = $this->repository->findById($args['id']);
        $category->setName($requestBody['name']);

        $payload = json_encode($category);

        $this->repository->update($category);

        $status = (is_null($category)) ? 204 : 200;

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }

    public function remove(Request $request, Response $response, $args): Response
    {
        $category = $this->repository->findById($args['id']);
        $this->repository->remove($category);
        return $response;
    }
}
