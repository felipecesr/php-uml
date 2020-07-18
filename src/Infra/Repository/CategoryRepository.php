<?php

namespace App\Infra\Repository;

use App\Domain\Model\Category;
use App\Domain\Model\Product;
use App\Domain\Repository\ICategoryRepository;
use App\Infra\Persistence\ConnectionFactory;

class CategoryRepository implements ICategoryRepository
{
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionFactory::createConnection();
    }

    public function _allCategories(): array
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
            $categorias[] = new Category(
                $categoryData['id'],
                $categoryData['nome']
            );
        }

        return $categorias;
    }

    public function insert(Category $categoria)
    {
        $query = 'INSERT INTO categorias (nome) VALUES (:nome)';
        $stmt = $this->connection->prepare($query);

        return $stmt->execute([
            ':nome' => $categoria->getName()
        ]);
    }

    public function update(Category $categoria)
    {
        $query = 'UPDATE categorias SET nome = :nome WHERE id = :id';
        $stmt = $this->connection->prepare($query);

        $data = $stmt->execute([
            ':id'   => $categoria->id,
            ':nome' => $categoria->getName()
        ]);

        return $data;
    }

    public function remove(int $id)
    {
        $query = 'DELETE FROM categorias WHERE id = :id';
        $stmt = $this->connection->prepare($query);

        return $stmt->execute([
            ':id'   => $id
        ]);
    }

    public function allCategories(): array
    {
        $query = 'SELECT categorias.id,
                         categorias.nome,
                         produtos.id as produto_id,
                         produtos.nome as produto_nome,
                         produtos.preco
                    FROM categorias
                    INNER JOIN produtos_categorias ON produtos_categorias.categoria_id = categorias.id
                    INNER JOIN produtos ON produtos_categorias.produto_id = produtos.id';
        $stmt = $this->connection->query($query);
        $result = $stmt->fetchAll();
        $categories = [];

        foreach ($result as $row) {
            if (!array_key_exists($row['id'], $categories)) {
                $categories[$row['id']] = new Category(
                    $row['id'],
                    $row['nome']
                );
            }

            $product = new Product(
                $row['produto_id'],
                $row['produto_nome'],
                $row['preco']
            );

            $categories[$row['id']]->addProduct($product);
        }

        return array_merge($categories);
    }
}
