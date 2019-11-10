<?php

namespace Entity;

class Categoria implements \JsonSerializable
{
    private $id;
    private $nome;

    private $produtos = [];

    public function __construct(int $id, string $nome)
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
                'id'   => $this->getId(),
                'nome' => $this->getNome(),
                'produtos' => $this->getProdutos()
            ];
    }
}
