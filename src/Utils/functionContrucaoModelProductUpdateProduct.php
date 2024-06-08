<?php

use App\Model\Product;

    function contrucaoModelProductUpdateProduct($body){
       return new Product(
            null, 
            $body["titulo"],
            $body["descricao"],
            $body["preco"],
            $body["estoque"],
            $body["pathImagem"],
            $body["idCategoria"],
            $body["idFabricante"]
        );
    }