<?php 

namespace App\Model;

class FabricanteModel{
    private int $idFabricante;
    private string $nomeFantasia;
    private string $cidade;
    private string $estado;
    private string $pais;
    private string $cnpj;

    public function __construct(string $nomeFantasia, string $cidade, string $estado, string $pais, string $cnpj)
    {
        $this->nomeFantasia = $nomeFantasia;
        $this->nomeFantasia = $cidade;
        $this->nomeFantasia = $estado;
        $this->nomeFantasia = $pais;
        $this->nomeFantasia = $cnpj;
    }

    public function getIdFabricante()
    {
        return $this->idFabricante;
    }

    public function setIdFabricante($idFabricante)
    {
        $this->idFabricante = $idFabricante;
    }

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }
 
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
}