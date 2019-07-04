<?php

namespace Domain;

class Produto implements \JsonSerializable
{
    private $id;
    private $nome;
    private $preco;

    private $categorias = array();

    public function __construct(int $id, string $nome, float $preco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
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

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getCategorias()
    {
        return $this->categorias;
    }

    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }
}
