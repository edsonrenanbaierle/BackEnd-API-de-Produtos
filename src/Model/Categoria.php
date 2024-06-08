<?php

namespace App\Model;

class Categoria{
    private int $id;
    private string $nameCategoria;

    public function __construct(string $nameCategoria)
    {
        $this->nameCategoria = $nameCategoria;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getNameCategoria()
    {
        return $this->nameCategoria;
    }

    public function setNameCategoria($nameCategoria)
    {
        $this->nameCategoria = $nameCategoria;
    }

   
}