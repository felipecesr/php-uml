<?php

namespace App\Controller;

use App\Domain\Categoria;
use App\Repository\CategoriaRepository;

class CategoriaController
{
    private $categoriaRepository;

    public function __construct()
    {
        $this->categoriaRepository = new CategoriaRepository();
    }

    public function create()
    {
        $nome = $_POST['nome'];
        $categoria = new Categoria($nome);
        $this->categoriaRepository->add($categoria);
        return $categoria;
    }

    public function insert()
    {
        $nome = $_POST['nome'];
        $result = $this->categoriaRepository->insert($nome);
        echo json_encode($result);
    }

    public function listar()
    {
        $result = $this->categoriaRepository->findAll();
        echo json_encode($result);
    }
}
