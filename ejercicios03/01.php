<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    table, td{
        border: 1px solid black; 
        border-collapse:collapse;
        padding: 5px;
    }
    
  </style>
</head>

<body>

<?php

    $numeros = [];
    
    echo "<table>
            <tbody>
                <tr>";
    
    for ($i = 0; $i < 20; $i++) {
        $numeros[] = random_int(1,10);
        
        echo "<td>".$numeros[$i]."</td>";
    }
    
    echo "</tr>
          </tbody>
          </table><br>


           Numero maximo: ".max($numeros)."</br>
           Numero minimo: ".min($numeros)."</br>
           Numero repetido mas veces: ".$numeros[max(array_count_values($numeros))];

?>
</body>
</html>