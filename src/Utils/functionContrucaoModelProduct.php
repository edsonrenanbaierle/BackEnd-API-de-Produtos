<?php

use App\Model\Product;

function contrucaoModelProductUpdateProduct($body, $caminhoImgUrl)
{
    return new Product(
        null,
        $body["titulo"],
        $body["descricao"],
        $body["preco"],
        $body["estoque"],
        $caminhoImgUrl,
        $body["idCategoria"],
        $body["idFabricante"]
    );
}

function contrucaoModelProductAddProduct($body, $caminhoImgUrl)
{
    return new Product(
        null,
        $body["titulo"],
        $body["descricao"],
        $body["preco"],
        0,
        $caminhoImgUrl,
        $body["idCategoria"],
        $body["idFabricante"]
    );
}

function contrucaoModelProductApi($body)
{
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
