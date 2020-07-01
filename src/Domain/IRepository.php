<?php

namespace App\Domain;

use App\Domain\Cidade;

interface IRepository
{
    public function save(Cidade $cidade): bool;

    /** @return Cidade[] */
    public function findAll(): array;

    public function findOne($id): Cidade;

    public function update($id): void;

    public function remove(Cidade $cidade): bool;
}
