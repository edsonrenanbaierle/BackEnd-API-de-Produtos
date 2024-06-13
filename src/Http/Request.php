<?php

namespace App\Http;

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
}
