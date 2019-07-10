<?php

namespace Services;

use Domain\Categoria;
use Repositories\CategoriaRepository;

class CategoriaService
{
    public function listar()
    {
        $repo = new CategoriaRepository();
        $result = $repo->findAll();
        return $result;
    }

    public function buscar(int $id) : Categoria
    {
        $repo = new CategoriaRepository();
        $obj = $repo->findOne($id);
        $obj2 = new Categoria($obj['id'], $obj['nome']);
        $obj2->setProdutos($obj['produtos']);
        return $obj2;
    }
}
