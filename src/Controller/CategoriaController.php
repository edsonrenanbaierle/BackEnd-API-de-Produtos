<?php 

namespace App\Controller;

use App\DAO\CategoriaDAO;
use App\Http\Request;
use App\Http\RequestValidateCategoriaController;
use App\Http\Response;

class CategoriaController{
    public function addCategoria(){
        try {
            $body = Request::body();

            RequestValidateCategoriaController::validateControllerCategoria($body, "addCategoria");
            
            $categoriaDao = new CategoriaDAO;
            $respostaAoUsuario = $categoriaDao->addCategoria($body);
            
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
}