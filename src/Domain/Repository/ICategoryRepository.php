<?php

namespace App\Domain\Repository;

interface ICategoryRepository
{
    public function allCategories(): array;
}
