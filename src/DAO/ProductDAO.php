<?php

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Product;
use Exception;

class ProductDAO
{

    public function getProduct($idProduct)
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT p.idProduto, p.idFabricante, p.titulo, p.descricao, p.preco, p.estoque, p.pathImagem, c.nameCategoria
                    FROM produto p 
                    INNER JOIN categoria c ON c.idCategoria = p.idCategoria
                    WHERE idProduto = :idProduto";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idProduto', $idProduct);
            $stmt->execute();

            if ($stmt->rowCount() == 0) throw new Exception("Não foi possível indentificar o produto");

            $result =  $stmt->fetch(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function addProduct(Product $product)
    {
        try {
            $coon = DbConn::coon();

            $sql = "INSERT INTO produto (titulo, descricao, preco, estoque, pathImagem, idCategoria, idFabricante)
                VALUES (:titulo, :descricao, :preco, :estoque, :pathImagem, :idCategoria, :idFabricante)";

            $stmt = $coon->prepare($sql);

            $estoque = 0;
            $imageUrl = $product->getPathImagem();

            $stmt->bindValue(':titulo', $product->getTitulo());
            $stmt->bindValue(':descricao', $product->getDescricao());
            $stmt->bindValue(':preco', $product->getPreco());
            $stmt->bindValue(':estoque', $estoque);
            $stmt->bindValue(':pathImagem', $imageUrl);
            $stmt->bindValue(':idCategoria', $product->getIdCategoria());
            $stmt->bindValue(':idFabricante', $product->getIdFabricante());

            $stmt->execute();

            return "Sucesso ao cadastrar o Produto";
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) throw new Exception("Erro idCategoria ou idFabricante Invalidos!", 404);
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }


    public function removeProduct($id)
    {
        try {
            $conn = DbConn::coon();

            $sql = "DELETE FROM produto WHERE idProduto = :idProduto";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idProduto', $id);
            $stmt->execute();

            if ($stmt->rowCount() == 0) throw new Exception("Não foi possivel encontrar o produto para remoção");

            return "Sucesso ao remover o produto!";
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $conn = null;
        }
    }


    public function updateProduct($id, Product $product)
    {
        try {
            $coon = DbConn::coon();

            $sql = "UPDATE produto 
                    SET titulo = :titulo, descricao = :descricao, preco = :preco, estoque = :estoque, pathImagem = :pathImagem, idCategoria = :idCategoria, idFabricante = :idFabricante 
                    WHERE idProduto = :idProduto";

            $stmt = $coon->prepare($sql);

            $stmt->bindValue(':titulo', $product->getTitulo());
            $stmt->bindValue(':descricao', $product->getDescricao());
            $stmt->bindValue(':preco', $product->getPreco());
            $stmt->bindValue(':estoque', $product->getEstoque());
            $stmt->bindValue(':pathImagem', $product->getPathImagem());
            $stmt->bindValue(':idCategoria', $product->getIdCategoria());
            $stmt->bindValue(':idFabricante', $product->getIdFabricante());
            $stmt->bindValue(':idProduto', $id);

            $stmt->execute();

            if ($stmt->rowCount() == 0) throw new Exception("Não foi possível indentificar o produto");

            return "Sucesso ao atualizar o produto";
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) throw new Exception("Erro idCategoria ou idFabricante Invalidos!", 404);
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }


    public function listAllProduct()
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT p.idProduto, p.titulo, p.descricao, p.preco, p.estoque, p.pathImagem, c.nameCategoria, f.nomeFantasia, f.cnpj
                    FROM produto p 
                    INNER JOIN categoria c ON c.idCategoria = p.idCategoria
                    INNER JOIN fabricante f ON f.idFabricante = p.idFabricante";

            $stmt = $coon->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 0) throw new Exception("Nenhum produto cadastrado!");

            return $result;
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }

    public function updateImageProduct($idProduto, $pathImagem)
    {
        try {
            $coon = DbConn::coon();

            $sql = "UPDATE produto
                    SET pathImagem  = :pathImagem
                    WHERE idProduto = :idProduto";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(":idProduto", $idProduto);
            $stmt->bindParam(":pathImagem", $pathImagem);
            $stmt->execute();

            if ($stmt->rowCount() == 0) throw new Exception("Produto não encontrado!");

            return "Imagem atualizada com sucesso";
        } catch (\PDOException $e) {
            throw new Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), 404);
        } finally {
            $coon = null;
        }
    }
}
