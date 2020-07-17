<?php

namespace App\Controller;

use App\Domain\Categoria;
use App\Infra\Repository\CategoriaRepository;

class CategoriaController
{
    private $categoriaRepository;

    public function __construct()
    {
        $this->categoriaRepository = new CategoriaRepository();
    }

    public function list()
    {
        $categorias = $this->categoriaRepository->allCategories();
        echo json_encode($categorias);
    }

    public function insert()
    {
        $categoria = new Categoria(null, $_POST['name']);
        return $this->categoriaRepository->insert($categoria);
    }

    public function remove()
    {
        var_dump($_SERVER);
    }
}
