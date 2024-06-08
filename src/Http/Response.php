<?php

namespace App\Http;

class Response
{

    public static function responseMessage(array $body = [], int $statusCode = 200)
    {
        http_response_code($statusCode);
        header("Content-type: application/json");

        echo json_encode($body);
    }
}
