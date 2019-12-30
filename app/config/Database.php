<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=db;dbname=testedb;charset=utf8';

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_ROOT_PASSWORD'], $options);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        return $query;
    }

    public function findById($table, $primaryKey, $value)
    {
        $query = 'SELECT * FROM `' . $table . '` WHERE `' . $primaryKey . '` = :value';

        $parameters = [
            'value' => $value
        ];

        $query = $this->query($query, $parameters);

        return $query->fetch();
    }

    private function insert($table, $fields)
    {
        $query = 'INSERT INTO `' . $table . '` (';

        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '`,';
        }

        $query = rtrim($query, ',');

        $query .= ')';

        $fields = $this->processDates($fields);

        $this->query($query, $fields);
    }

    private function processDates($fields)
    {
    }
}
