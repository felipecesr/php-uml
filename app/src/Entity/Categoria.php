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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function setProdutos($produtos)
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
