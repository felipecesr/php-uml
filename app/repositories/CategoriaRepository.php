<?php

namespace Repositories;

class CategoriaRepository
{
    public function findOne(int $id)
    {
        $conn = new \PDO("mysql:dbname=testedb;host=db", "root", "example");
        $stm = $conn->prepare("SELECT * FROM categorias WHERE id= '$id'");

        $stm->execute();
        $result = $stm->fetch();

        return $result;
    }
}
