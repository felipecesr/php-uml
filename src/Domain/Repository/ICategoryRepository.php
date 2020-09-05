<?php

namespace App\Domain\Repository;

use App\Domain\Model\Category;

interface ICategoryRepository
{
    public function allCategories(): array;
    public function save(Category $category);
    public function insert(Category $category);
    public function remove(Category $category);
    public function update(Category $category);
    public function findById(int $id): Category;
}
