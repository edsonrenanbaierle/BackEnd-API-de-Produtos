<?php

namespace App\Model;

class Categoria
{
    private ?int $id;
    private string $nameCategoria;

    public function __construct(int $id = null, string $nameCategoria)
    {
        $this->id = $id;
        $this->nameCategoria = $nameCategoria;
    }

    public function getId()
    {
        return $this->id;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    public function getNameCategoria()
    {
        return $this->nameCategoria;
    }

    private function setNameCategoria($nameCategoria)
    {
        $this->nameCategoria = $nameCategoria;
    }
}
