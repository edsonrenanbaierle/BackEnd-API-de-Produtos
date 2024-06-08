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

    function contrucaoModelProductAddProduct($body){
        return new Product(
             null, 
             $body["titulo"],
             $body["descricao"],
             $body["preco"],
             0,
             $body["pathImagem"],
             $body["idCategoria"],
             $body["idFabricante"]
         );
     }

     function contrucaoModelProductApi($body){
        $price = intval($body->price * 100);
        return new Product(
             null, 
             $body->title,
             $body->description,
             $price,
             0,
             $body->image,
             1,
             1
         );
     }