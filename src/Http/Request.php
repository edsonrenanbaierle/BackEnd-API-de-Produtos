<?php

namespace App\Http;

use App\Http\Response;
use Exception;

class Request
{

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function body()
    {
        return json_decode(file_get_contents("php://input"), true);
    }

    public static function validade($body, $deveConterPorParametro)
    {

        foreach ($deveConterPorParametro as $value) {
            if (!isset($body["$value"])) {
                $error =  ["error" => "Campo $value não informado"];
            }
        }

        if (count($body) > count($deveConterPorParametro)) {
            $quantidadeDeParametrosExtras = count($body) - count($deveConterPorParametro);
            $error = ["error" => "Por favor confirme os parametro, $quantidadeDeParametrosExtras parametro passado a mais"];
        }

        if (isset($error["error"])) {
            return throw new Exception($error["error"]);
        }

        return [];
    }
}
