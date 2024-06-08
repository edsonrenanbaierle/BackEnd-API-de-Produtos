<?php

function retornarDadosApiProducts()
{
    try {
        $urlApiProducts = "https://fakestoreapi.com/products";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $urlApiProducts);
        $response = curl_exec($ch);
        unset($ch);

        return json_decode($response);
    } catch (\Exception $e) {
       throw new Exception("Não foi possivel carregas os dados da Api de Produtos", 400);
    }
}

?>
