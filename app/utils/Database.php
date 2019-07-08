<?php

class DataBase
{
    private $pdo;
    private $table;
    private $primaryKey;

    public function __construct(
        PDO $pdo,
        string $table,
        string $primaryKey
    ) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    private function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        return $query;
    }

    public function findById($value)
    {
        $query = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->primaryKey . '` = :value';
        $parameters = [
            'value' => $value
        ];
        $query = $this->query($query, $parameters);
        return $query->fetch();
    }

    public function findAll()
    {
        $result = $this->query('SELECT * FROM `' . $this->table . '`');
        return $result->fetchAll();
    }
}
