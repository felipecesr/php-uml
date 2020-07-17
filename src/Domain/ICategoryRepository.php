<?php

namespace App\Domain;

use App\Domain\Categoria;

interface ICategoryRepository
{
    public function allCategories(): array;
}
