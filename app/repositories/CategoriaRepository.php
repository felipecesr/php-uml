<?php

namespace Repositories;

require __DIR__ . '/../core/Database.php';

class CategoriaRepository
{
    private $db;
    private $table = 'categorias';

    public function __construct()
    {
        $this->db = new \Database;
    }

    public function findAll()
    {
        $result = $this->db->query('SELECT * FROM `' . $this->table . '`');
        return $result->fetchAll();
    }

    public function findOne(int $id)
    {
        $parameters = [
            'id' => $id
        ];

        $queryCategorias = 'SELECT * FROM `categorias` WHERE `id` = :id';
        $categorias = $this->db->query($queryCategorias, $parameters)->fetch();

        $queryProdutos = 'SELECT p.id, p.nome, p.preco FROM produtos p, produtos_categorias j WHERE p.id = j.produto_id AND j.categoria_id = :id';
        $produtos = $this->db->query($queryProdutos, $parameters)->fetchAll();

        $categorias["produtos"] = $produtos;

        return $categorias;
    }
}
