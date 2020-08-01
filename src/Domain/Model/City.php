<?php

class City
{
    private ?int $id;
    private string $name;
    private State $state;

    public function __construct(?int $id, string $name, State $state)
    {
        $this->id = $id;
        $this->name = $name;
        $this->state = $state;
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }
}
