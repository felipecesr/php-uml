<?php

namespace Controller;

use Entity\Categoria;
use Infra\CategoriaInfra;

class CategoriaController
{
    public function listar()
    {
        $repo = new CategoriaInfra();
        $result = $repo->findAll();
        return $result;
    }

    public function buscar(int $id) : Categoria
    {
        $repository = new CategoriaInfra();
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
