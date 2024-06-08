<?php 
namespace App\Model;

class Product{
    private int $idProduto;
    private string $titulo;
    private string $descricao;
    private int $preco;
    private int $estoque;
    private string $pathImagem;
    private int $idCategoria;
    private int $idFabricante;

    public function __construct(string $titulo, string $descricao, int $preco, int $estoque, string $pathImagem, int $idCategoria, int $idFabricante)
    {
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

    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;

    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    public function getPathImagem()
    {
        return $this->pathImagem;
    }

    public function setPathImagem($pathImagem)
    {
        $this->pathImagem = $pathImagem;

    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function getIdFabricante()
    {
        return $this->idFabricante;
    }

    public function setIdFabricante($idFabricante)
    {
        $this->idFabricante = $idFabricante;
    }
}