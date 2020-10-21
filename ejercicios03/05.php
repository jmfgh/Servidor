<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    table, td, th{
        border: 1px solid black; 
        border-collapse:collapse;
        padding: 5px;
    }
    
  </style>
</head>

<body>

<?php

    $rango = [];
    
    for ($i = 1; $i <= 49; $i++) {
        $rango[] = $i;
    }
    
    $numeros = [];
    
    
    
    echo "<table>
            <tbody>";
    
        foreach ($deportes as $deporte => $img){
            echo "<tr><td>".$deporte."</td><td><img src=".$img."></td></tr>";
        }
    
    echo "</tbody>
          </table>";

?>
</body>
</html>