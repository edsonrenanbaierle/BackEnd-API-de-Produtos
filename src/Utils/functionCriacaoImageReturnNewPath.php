<?php

function criacaoImageReturnNewPath($body)
{
    try {
        [$extensao, $base64] = explode(",", $body["imageBase64"]);

        $regex = '/\/(.*?);/';
        preg_match_all($regex, $extensao, $resultado);

        $extensao = $resultado[1][0];
        $conteudoDoArquivo = base64_decode($base64);
        $nomeArquivo = uniqid();

        $diretorioCompletoImage = "src/Images/" . $nomeArquivo . "." . $extensao;
        $fopenImage = fopen($diretorioCompletoImage, 'w');
        fwrite($fopenImage, $conteudoDoArquivo);
        fclose($fopenImage);

        return "/" . $diretorioCompletoImage;
    } catch (\Exception $e) {
        throw new Exception($e->getMessage(), 500);
    }
}
