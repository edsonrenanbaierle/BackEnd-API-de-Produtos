<?php 

namespace App\Http;

class RequestValidateFabricante{
    private static $dataRequestControllerConfirmation = [
        "addFabricante" => ["nomeFantasia", "cidade", "estado", "pais", "cnpj"]
    ];

    public static function validateControllerFabricante($body, $nameFunctionControlerFabricante){
        $deveConterPorParametro = self::$dataRequestControllerConfirmation[$nameFunctionControlerFabricante];
        foreach ($deveConterPorParametro as $value) {
            if (!isset($body["$value"])) {
                $error =  ["error" => "Campo $value não informado"];
                break;
            }
        }
        if (count($body) > count($deveConterPorParametro)) {
            $quantidadeDeParametrosExtras = count($body) - count($deveConterPorParametro);
            $error = ["error" => "Por favor confirme os parametro, $quantidadeDeParametrosExtras parametro passado a mais"];
        }

        if (isset($error["error"])) {
            throw new \Exception($error["error"], 400);
        } 
    }
}