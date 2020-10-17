<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php

    $medios =  [ "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es", "ABC" => "https://www.abc.es", 
             "Huffington Post" => "https://www.huffingtonpost.es", "Diario Publico" => "https://www.publico.es"];


    echo "<ul>";
    
    foreach ($medios as $medio => $value){
        echo "<li><a href='".$value."'>".$medio."</li>";
    }
?>
</body>
</html>