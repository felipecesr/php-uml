<?php

namespace Repositories;

class CategoriaRepository
{
    public function findOne(int $id)
    {
        $conn = new \PDO("mysql:dbname=blog;host=db", "root", "docker");
        $stm = $conn->prepare("SELECT * FROM categorias WHERE id= '$id'");

        $stm->execute();
        $result = $stm->fetch();

        return $result;
    }
}
