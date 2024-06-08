<?php 
namespace App\Model;

class Product{
    private ?int $idProduto;
    private string $titulo;
    private string $descricao;
    private int $preco;
    private int $estoque;
    private string $pathImagem;
    private int $idCategoria;
    private int $idFabricante;

    public function __construct(int $idProduto = null, string $titulo, string $descricao, int $preco, int $estoque, string $pathImagem, int $idCategoria, int $idFabricante)
    {
        $this->idProduto = $idProduto;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->estoque = $estoque;
        $this->pathImagem = $pathImagem;
        $this->idCategoria = $idCategoria;
        $this->idFabricante = $idFabricante;
    }

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    private function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    private function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    private function setDescricao($descricao)
    {
        $this->descricao = $descricao;

    }

    public function getPreco()
    {
        return $this->preco;
    }

    private function setPreco($preco)
    {
        $this->preco = $preco;

    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    private function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    public function getPathImagem()
    {
        return $this->pathImagem;
    }

    private function setPathImagem($pathImagem)
    {
        $this->pathImagem = $pathImagem;

    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    private function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function getIdFabricante()
    {
        return $this->idFabricante;
    }

    private function setIdFabricante($idFabricante)
    {
        $this->idFabricante = $idFabricante;
    }
}