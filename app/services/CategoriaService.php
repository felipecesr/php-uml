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
        $repository = new CategoriaRepository();
        $categoria = $repository->findOne($id);
        $produtos = [];

        foreach ($categoria as $key => $value) {
            $produtos[] = array(
                "id" => $value["produto_id"],
                "nome" => $value["produto_nome"],
                "preco" => $value["produto_preco"]
            );
        }


        $obj2 = new Categoria($categoria[0]['categoria_id'], $categoria[0]['categoria_nome']);
        $obj2->setProdutos($produtos);
        return $obj2;
    }
}
