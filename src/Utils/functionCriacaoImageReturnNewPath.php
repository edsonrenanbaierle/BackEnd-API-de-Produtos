<?php

function criacaoImageReturnNewPath($body)
{
    try {
        print_r($_FILES['arquivo']);
        print_r($_POST['arquivo']);
        $pasta = "images/";
        $nomeArq = $body["nomeArquivoImagem"];
        $novoNomeArq = uniqid();
        $extensao =  strtolower(pathinfo($nomeArq, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png") {
            throw new Exception("Extensao do arquivo inválida!");
        }

        $deucerto = move_uploaded_file($body["nomeTemporarioImage"], $pasta . $novoNomeArq . "." . $extensao);

        if (!$deucerto) {
            printf($deucerto);
            echo "<br>";
            print_r($body["nomeTemporarioImage"]);
            echo "<br>";
            print_r($pasta . $novoNomeArq . "." . $extensao);
            echo "<br>";
            throw new Exception("Erro ao cadastrar produto, não foi possivel carregar a imagem", 500);
        }

        return "src/" . $pasta . $novoNomeArq . "." . $extensao;
    } catch (\Exception $e) {
        throw new Exception($e->getMessage(), 500);
    }
}
