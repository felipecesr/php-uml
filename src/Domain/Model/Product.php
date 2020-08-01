<?php

namespace App\Domain\Model;

class Product implements \JsonSerializable
{
    private ?int $id;
    private string $name;
    private float $price;
    private array $categories;

    public function __construct(?int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->categories = [];
    }

    /** @return Category[] */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function addCategory(Category $category): void
    {
        $this->categories[] = $category;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->id,
                'name' => $this->name,
                'price' => $this->price
            ];
    }
}
