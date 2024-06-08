<?php 

namespace App\Controller;

use App\DAO\CategoriaDAO;
use App\Http\Request;
use App\Http\RequestValidateCategoriaController;
use App\Http\Response;
use App\Model\Categoria;

class CategoriaController{
    public function addCategoria(){
        try {
            $body = Request::body();

            RequestValidateCategoriaController::validateControllerCategoria($body, "addCategoria");
            
            $categoria = new Categoria(null, $body["categoria"]);
            $categoriaDao = new CategoriaDAO;
            $respostaAoUsuario = $categoriaDao->addCategoria($categoria);
            
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "data" => $respostaAoUsuario
            ], 200);

        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function removeCategoria($id){
        try {   
            $categoriaDao = new CategoriaDAO;
            $respostaAoUsuario = $categoriaDao->removeCategoria($id[0]);
            
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "data" => $respostaAoUsuario
            ], 200);

        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function getAllCategoria($id){
        try {   
            $categoriaDao = new CategoriaDAO;
            $respostaAoUsuario = $categoriaDao->getAllCategoria();
            
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "data" => $respostaAoUsuario
            ], 200);

        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }
}