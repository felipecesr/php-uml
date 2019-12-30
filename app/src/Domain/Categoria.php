<?php

namespace App\Domain;

class Categoria implements \JsonSerializable
{
    private $nome;
    private $produtos = [];

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getProdutos(): array
    {
        return $this->produtos;
    }

    public function setProdutos(array $produtos)
    {
        $this->produtos = $produtos;
    }

    public function jsonSerialize()
    {
        return
            [
                'nome' => $this->getNome(),
                'produtos' => $this->getProdutos()
            ];
    }
}
