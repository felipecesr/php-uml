<?php

namespace App\Domain;

class Estado implements \JsonSerializable
{
    private ?int $id;
    private string $nome;
    private array $cidades;

    public function __construct(?int $id, string $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cidades = [];
    }

    public function jsonSerialize()
    {
        return
            [
                'id'      => $this->id,
                'nome'    => $this->nome,
                'cidades' => $this->cidades
            ];
    }
}
