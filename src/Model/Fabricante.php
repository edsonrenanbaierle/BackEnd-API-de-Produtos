<?php 

namespace App\Model;

class Fabricante{
    private ?int $idFabricante;
    private string $nomeFantasia;
    private string $cidade;
    private string $estado;
    private string $pais;
    private string $cnpj;

    public function __construct(int $idFabricante = null, string $nomeFantasia, string $cidade, string $estado, string $pais, string $cnpj)
    {
        $this->idFabricante = $idFabricante;
        $this->nomeFantasia = $nomeFantasia;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->pais = $pais;
        $this->cnpj = $cnpj;
    }

    public function getIdFabricante()
    {
        return $this->idFabricante;
    }

    private function setIdFabricante($idFabricante)
    {
        $this->idFabricante = $idFabricante;
    }

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    private function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    private function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    private function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getPais()
    {
        return $this->pais;
    }

    private function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }
 
    private function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
}