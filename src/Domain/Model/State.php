<?php

class State
{
    private ?int $id;
    private string $name;
    private array $cities;

    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cities = [];
    }

    /** @return City[] */
    public function getCities(): array
    {
        return $this->cities;
    }

    public function setCities(array $cities)
    {
        $this->cities = $cities;
    }
}
