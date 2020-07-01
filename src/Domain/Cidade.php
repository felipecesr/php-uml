<?php

namespace App\Domain;

class Cidade implements \JsonSerializable
{
    private ?int $id;
    private string $nome;
    private Estado $estado;

    public function __construct(?int $id, string $nome, Estado $estado)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->estado = $estado;
    }

    public function getId(): ?int
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

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'nome' => $this->getNome(),
                'estado' => $this->getEstado()
            ];
    }
}
