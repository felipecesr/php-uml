<?php

namespace App\Infra\Persistence;

use PDO;

class ConnectionFactory
{
    public static function createConnection(): PDO
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        return new PDO('mysql:host=db;dbname=test;charset=utf8', 'root', 'secret', $options);
    }
}
