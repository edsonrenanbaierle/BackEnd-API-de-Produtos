<?php 

    
    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];
        var_dump($_FILES['arquivo']);

        $pasta = "src/images/";
        $nomeArq = $arquivo['name'];
        $novoNomeArq = uniqid();
        $extensao =  strtolower(pathinfo($nomeArq, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png"){
            die("Tipo Arq n Aceito");
        }

        $deucerto = move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeArq . "." . $extensao);
        print_r($arquivo["tmp_name"]); echo "<br>";
        print_r($nomeArq); echo "<br>";
        print_r($pasta); echo "<br>";
        print_r($extensao); echo "<br>";
        if($deucerto){
            echo "<p> Arquivo enviado com suececeso</p>";
        }else{
            echo "<p> Deu errado</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form method="post" enctype="multipart/form-data">
        <label for="">Selecione o arq</label>
        <input type="file" name="arquivo">
        <button type="submit">Enviar arq</button>
   </form>
</body>
</html>