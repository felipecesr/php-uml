<?php

namespace App\Infra\Repository;

use App\Domain\Categoria;
use App\Domain\ICategoryRepository;
use App\Infra\Persistence\ConnectionFactory;

class CategoriaRepository implements ICategoryRepository
{
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionFactory::createConnection();
    }

    public function allCategories(): array
    {
        $query = 'SELECT * FROM categorias';
        $stmt = $this->connection->query($query);

        return $this->hydrateCategoryList($stmt);
    }

    private function hydrateCategoryList(\PDOStatement $stmt): array
    {
        $categoryDataList = $stmt->fetchAll();
        $categorias = [];
        foreach ($categoryDataList as $categoryData) {
            $categorias[] = new Categoria(
                $categoryData['id'],
                $categoryData['nome']
            );
        }

        return $categorias;
    }

    public function insert(Categoria $categoria)
    {
        $query = 'INSERT INTO categorias (nome) VALUES (:nome)';
        $stmt = $this->connection->prepare($query);

        return $stmt->execute([
            ':nome' => $categoria->getNome()
        ]);
    }

    public function update(Categoria $categoria)
    {
        $query = 'UPDATE categorias SET nome = :nome WHERE id = :id';
        $stmt = $this->connection->prepare($query);

        $data = $stmt->execute([
            ':id'   => $categoria->id,
            ':nome' => $categoria->getNome()
        ]);

        return $data;
    }

    public function remove($id)
    {
        $query = 'DELETE FROM categorias WHERE id = ?';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue($id, \PDO::PARAM_INT);

        return $stmt->execute();
    }
}
