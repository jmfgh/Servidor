<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
      table, th, td {
        border-collapse: collapse;
      }
      
      th, td {
        padding: 5px;
      }

  </style>

</head>

<body>
    <?php
    
    function generarHTMLtable($filas, $columnas, $borde, $contenido){
        
        echo "<table style='border:".$borde."px solid black;'>
                <thead>
                <tr>
                <th colspan = '".$columnas."'>Generacion de Tabla con una funcion</th>
                </tr>
                </thead>
                <tbody>";
        
            for ($i = 0; $i < $filas; $i++) {
                echo "<tr>";
          
                  for ($a = 0; $a < $columnas; $a++) {
                      echo "<td style='border:".$borde."px solid black;'>".$contenido."</td>";
                  }
          
                echo "</tr>";
            } 
        
        echo "</tbody>
              </table>";
        
    }
    
      generarHTMLtable(3, 5, 2, "hola") 
    ?>
</body>

</html>