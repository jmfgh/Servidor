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
    
    img{
        height: 66px;
    
    }
    
  </style>
</head>

<body>

<?php

    $deportes = ["Karate" => "./img/Imagen1.jpg", "Tenis" => "./img/Imagen2.jpg", "Futbol" => "./img/Imagen3.jpg", 
                 "Baloncesto" => "./img/Imagen4.jpg", "Beisbol" => "./img/Imagen5.jpg"];
    
    
    echo "<table>
            <thead>
                <tr>
                    <th>Deporte</th><th>Logo</th>                    
                </tr>
            </thead>
            <tbody>";
    
        foreach ($deportes as $deporte => $img){
            echo "<tr><td>".$deporte."</td><td><img src=".$img."></td></tr>";
        }
    
    echo "</tbody>
          </table>";

?>
</body>
</html>