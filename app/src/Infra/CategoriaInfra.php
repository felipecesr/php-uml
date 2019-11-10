<?php

namespace Infra;

require __DIR__ . '/../../config/Database.php';

class CategoriaInfra
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

        $query = 'SELECT p.id produto_id, p.nome produto_nome, p.preco produto_preco, c.id categoria_id, c.nome categoria_nome FROM produtos p INNER JOIN produtos_categorias j ON p.id = j.produto_id INNER JOIN categorias c ON j.categoria_id = c.id WHERE c.id = :id';
        $result = $this->db->query($query, $parameters)->fetchAll();

        return $result;
    }
}
