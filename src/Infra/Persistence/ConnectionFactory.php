<?php

namespace App\Infra\Persistence;

use PDO;

class ConnectionFactory
{
    public function createConnection(): PDO
    {
        $path = __DIR__ . '/bd.sqlite';
        $pdo = new PDO('sqlite:' . $path);
        return $pdo;
    }
}
