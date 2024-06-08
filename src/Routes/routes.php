<?php

$routes = [
    "POST/product"          => "ProductController@addProduct",
    "DELETE/product/{id}"   => "ProductController@removeProduct",
    "PUT/product/{id}"      => "ProductController@updateProduct",
    "GET/product/{id}"      => "ProductController@getProduct",
    "GET/listAllProduct"    => "ProductController@listAllProduct",
    "POST/consumirApi"       => "ProductController@consumirApi",
    "POST/categoria"       => "CategoriaController@addCategoria",
    "DELETE/categoria/{id}"       => "CategoriaController@removeCategoria"
];
