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

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->id,
                'name' => $this->name,
                'price' => $this->price,
                'categories' => $this->categories
            ];
    }
}
