<?php

namespace Domain;

class Estado implements \JsonSerializable
{
    private $id;
    private $nome;
    private $cidades = array();

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

    public function getCidades()
    {
        return $this->cidades;
    }

    public function setCidades(array $cidades)
    {
        $this->cidades = $cidades;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'nome' => $this->getNome(),
                'cidades' => $this->getCidades()
            ];
    }
}
