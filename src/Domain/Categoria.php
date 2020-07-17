<?php

namespace App\Domain;

class Categoria implements \JsonSerializable
{
    private ?int $id;
    private string $nome;

    public function __construct(?int $id, string $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->id,
                'nome' => $this->getNome()
            ];
    }
}
