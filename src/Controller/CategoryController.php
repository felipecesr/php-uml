<?php

namespace App\Controller;

use App\Domain\Model\Category;
use App\Infra\Repository\CategoryRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class CategoryController
{
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function list(Request $request, Response $response): Response
    {
        $data = $this->categoryRepository->allCategories();
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function insert(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $category = new Category(null, $data['name']);
        $this->categoryRepository->insert($category);
        $response->getBody()->write(json_encode($category));
        return $response;
    }

    public function remove(Request $request, Response $response, $args): Response
    {
        $id = intval($args['id']);
        $this->categoryRepository->remove($id);
        return $response;
    }
}
