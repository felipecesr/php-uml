<?php

namespace Repositories;

class CategoriaRepository
{
    public function findOne(int $id)
    {
        try {
            $pdo = new \PDO('mysql:host=db;dbname=testedb;charset=utf8', 'root', 'docker');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // PDO mostra erros sempre que ocorrerem

            $queryCategorias = $pdo->prepare('SELECT * FROM `categorias` WHERE `id` = :id');
            $queryCategorias->bindValue(':id', $id);
            $queryCategorias->execute();
            $categorias = $queryCategorias->fetch(\PDO::FETCH_ASSOC);

            $queryProdutos = $pdo->prepare('SELECT p.id, p.nome, p.preco FROM produtos p, produtos_categorias j WHERE p.id = j.produto_id AND j.categoria_id = :id');
            $queryProdutos->bindValue(':id', $id);
            $queryProdutos->execute();
            $produtos = $queryProdutos->fetchAll(\PDO::FETCH_ASSOC);

            $categorias["produtos"] = $produtos;

            return $categorias;
        } catch (\PDOException $e) {
            return 'Unable to connect to the database server: ' . $e;
        }
    }
}
