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
        border: 1px solid black;
      }
      
      th {
        padding: 15px;
        background-color: blue;
        color: white;
      }
      
      td {
        width: 30px;
        height: 30px;
      }

  </style>

</head>

<body>
    <?php
        define('DIEZ', 10);
        
            $rojo = random_int(0,255);
            $verde = random_int(0,255);
            $azul = random_int(0,255);
            
            $cont = 0;
        
        echo "<table>
                <thead>
                <tr>
                <th colspan = '".DIEZ."'><h1>Tablero de colores</h1></th>
                </tr>
                </thead>
                <tbody>";
        
            for ($i = 0; $i < DIEZ; $i++) {
                echo "<tr>";
          
                  for ($a = 0; $a < DIEZ; $a++) {
                      $cont+=2;
                      echo "<td style='background-color: rgb(".($rojo + $a + $cont).",".($verde + $a + $cont).",".($azul + $a +$cont).")'></td>";
                  }
                  
                echo "</tr>";
            } 
        
        echo "</tbody>
              </table>";
        

    ?>
</body>

</html>