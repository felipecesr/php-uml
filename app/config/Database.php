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
}
