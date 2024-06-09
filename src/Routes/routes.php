<?php

$routes = [
    "POST/product"          => "ProductController@addProduct",
    "DELETE/product/{id}"   => "ProductController@removeProduct",
    "PUT/product/{id}"      => "ProductController@updateProduct",
    "GET/product/{id}"      => "ProductController@getProduct",
    "GET/listAllProduct"    => "ProductController@listAllProduct",
    "POST/consumirApi"       => "ProductController@consumirApi",
    "GET/AllCategoria"       => "CategoriaController@getAllCategoria",
    "POST/categoria"       => "CategoriaController@addCategoria",
    "DELETE/categoria/{id}"       => "CategoriaController@removeCategoria",
    "POST/fabricante"       => "FabricanteController@addFabricante",
    "DELETE/fabricante/{id}"       => "FabricanteController@removeFabricante"
];
