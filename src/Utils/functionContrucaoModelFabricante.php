<?php

use App\Model\Fabricante;

    function contrucaoModelFabricanteAddFabricante($body){
       return new Fabricante(
            null, 
            $body["nomeFantasia"],
            $body["cidade"],
            $body["estado"],
            $body["pais"],
            $body["cnpj"]
        );
    }
?>