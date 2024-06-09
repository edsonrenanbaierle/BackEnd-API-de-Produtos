<?php

namespace App\Controller;

use App\DAO\FabricanteDAO;
use App\Http\Request;
use App\Http\RequestValidateFabricante;
use App\Http\Response;


require_once __DIR__ . "/../Utils/functionContrucaoModelFabricante.php";

class FabricanteController
{

    public function addFabricante()
    {
        try {
            $body = Request::body();

            RequestValidateFabricante::validateControllerFabricante($body, "addFabricante");

            $fabricante = contrucaoModelFabricanteAddFabricante($body);

            $fabricanteDao = new FabricanteDAO();
            $respostaAoUsuario = $fabricanteDao->addFabricante($fabricante);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "Message" => $respostaAoUsuario
            ], 200);
        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function removeFabricante($id)
    {
        try {
            $fabricanteDao = new FabricanteDAO();
            $respostaAoUsuario = $fabricanteDao->removeFabricante($id[0]);

            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => $respostaAoUsuario
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
