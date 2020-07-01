<?php

namespace App\Infra;

use App\Domain\IRepository;
use \App\Domain\Cidade;
use App\Domain\Estado;

class CidadeRepository implements IRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findAll(): array
    {
        $query = 'SELECT * FROM cidades';
        $stmt = $this->connection->query($query);

        return [];
    }

    public function save(Cidade $cidade): bool
    {
        $cidade = new Cidade(null, 'Uruburetama', new Estado(null, 'Ceará'));
        $sql = "INSERT INTO cidades (name) VALUES (:name)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':name', $cidade->getNome());

        return $stmt->execute();
    }
}
