<?php

namespace Repositories;

class CategoriaRepository
{
    public function findOne(int $id)
    {
        $conn = new \PDO("mysql:dbname=testedb;host=db", "root", "docker");
        $selectCategorias = $conn->prepare("SELECT * FROM categorias WHERE id= '$id'");
        $selectProdutos = $conn->prepare("SELECT p.id, p.nome, p.preco FROM produtos p, produtos_categorias j WHERE p.id = j.produto_id AND j.categoria_id = '$id'");

        $selectCategorias->execute();
        $categorias = $selectCategorias->fetch(\PDO::FETCH_ASSOC);

        $selectProdutos->execute();
        $produtos = $selectProdutos->fetchAll(\PDO::FETCH_ASSOC);

        $categorias["produtos"] = $produtos;

        return $categorias;
    }
}
