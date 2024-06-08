<?php 

namespace App\DAO;

use App\Db\DbConn;
use Exception;

class CategoriaDAO{

    public function addCategoria($body){
        try {
            $conn = DbConn::coon();

            $sql = "INSERT INTO categoria (nameCategoria) VALUES (:nameCategoria)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nameCategoria', $body["categoria"]);
            $stmt->execute();

            return "Sucesso ao adicionar a categoria!";
        } catch (\PDOException $e) {
            if($e->getCode() == 23000) throw new Exception("A categoria informada já existe!", 500);
            throw new \Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 404);
        } finally {
            $conn = null;
        }
    }

    public function removeCategoria($id){
        try {
            $conn = DbConn::coon();

            $sql = "DELETE FROM categoria WHERE idCategoria = :idCategoria";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":idCategoria", $id);
            $stmt->execute();

            if ($stmt->rowCount() == 0) throw new \Exception("Não foi possivel encontrar a categoria para remoção");

            return "Sucesso ao remover a categoria!";
        } catch (\PDOException $e) {
            if($e->getCode() == 23000) throw new Exception("A categoria informada já esta vinculada a um produto, impossivel a remoção", 500);
            throw new \Exception($e->getMessage(), 500);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 404);
        } finally {
            $conn = null;
        }
    }
}