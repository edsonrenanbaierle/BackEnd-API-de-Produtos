<?php

namespace App\Http;

class RequestValidateProductController
{
    private static $dataRequestControllerConfirmation = [
        "addProduct" => ["titulo", "descricao", "preco", "imageBase64", "idCategoria", "idFabricante"],
        "updateProduct" => ["titulo", "descricao", "preco", "estoque", "imageBase64", "idCategoria", "idFabricante"],
        "updateImageProduto" => ["idProduto", "imageBase64"]
    ];

    public static function validateControllerProduct($body, $nameFunctionControlerProduct)
    {
        $deveConterPorParametro = self::$dataRequestControllerConfirmation[$nameFunctionControlerProduct];
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
