<?php

namespace App\DAO;

use App\Db\DbConn;
use App\Model\Fabricante;
use PDO;

class FabricanteDAO
{
    public function addFabricante(Fabricante $fabricante)
    {
        try {
            $coon = DbConn::coon();

            $nomeFantasia = $fabricante->getNomeFantasia();
            $cidade = $fabricante->getCidade();
            $estado = $fabricante->getEstado();
            $pais = $fabricante->getPais();
            $cnpj =  $fabricante->getCnpj();

            $sql = "INSERT INTO fabricante (nomeFantasia, cidade, estado, pais, cnpj) VALUES (:nomeFantasia, :cidade, :estado, :pais, :cnpj)";
            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':nomeFantasia', $nomeFantasia);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':pais', $pais);
            $stmt->bindParam(':cnpj', $cnpj);

            $stmt->execute();

            return "Sucesso ao cadastrar fabricante";
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) throw new \Exception("O Fabricante com o cnpj informado ja conta cadastrado", 500);
            throw new \Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 404);
        } finally {
            $conn = null;
        }
    }

    public function removeFabricante($idFabricante)
    {
        try {
            $coon = DbConn::coon();

            $sql = "DELETE FROM fabricante WHERE idFabricante = :idFabricante";
            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idFabricante', $idFabricante);

            $stmt->execute();

            if ($stmt->rowCount() == 0) throw new \Exception("Não foi possivel encontrar o fabricante para remoção");

            return "Sucesso ao remover o fabricante";
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) throw new \Exception("O fabricante informada já esta vinculada a um produto, impossivel a remoção", 500);
            throw new \Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 404);
        } finally {
            $conn = null;
        }
    }

    public function getFabricante($idFabricante)
    {
        try {
            $coon = DbConn::coon();

            $sql = "SELECT nomeFantasia, cidade, estado, pais, cnpj 
                    FROM fabricante
                    WHERE idFabricante = :idFabricante";

            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':idFabricante', $idFabricante);

            $stmt->execute();

            if ($stmt->rowCount() == 0) throw new \Exception("Não foi possivel encontrar o fabricante");

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 404);
        } finally {
            $conn = null;
        }
    }
}
