<?php

namespace App\Domain\Repository;

use App\Domain\Model\Category;

interface ICategoryRepository
{
    public function allCategories(): array;
    public function insert(Category $category);
    public function remove(int $id);
    public function findById(int $id);
}
