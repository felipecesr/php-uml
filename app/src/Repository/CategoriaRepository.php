<?php

namespace App\Repository;

use App\Domain\Categoria;
use Database;

require __DIR__ . '/../../config/Database.php';

class CategoriaRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    public function add(Categoria $categoria)
    {
        $sql = 'INSERT INTO categorias (nome) VALUES (?)';
        $this->pdo->query($sql, [$categoria->getNome()]);
    }

    public function insert(string $nome)
    {
        $sql = 'INSERT INTO categorias (nome) VALUES (?)';
        $this->pdo->query($sql, [$nome]);
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM categorias';
        $stm = $this->pdo->query($sql);
        return $stm->fetchAll();
    }
}
