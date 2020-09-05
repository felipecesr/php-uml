<?php

namespace App\Domain\Model;

class Category implements \JsonSerializable
{
    private ?int $id;
    private string $name;
    private array $products;

    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->products = [];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    /** @return Product[] */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->id,
                'name' => $this->name,
                'products' => $this->products
            ];
    }
}
