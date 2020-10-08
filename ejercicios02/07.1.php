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
        
        function generarColor() {
            $num = random_int(1,5);
            $color = "";
            
            switch ($num) {
                case 1:
                    $color = "red";
                break;
                case 2:
                    $color = "green";
                break;
                case 3:
                    $color = "blue";
                    break;
                case 4:
                    $color = "white";
                break;
                case 5:
                    $color = "black";
                break;
            }
            
            return $color;
        }
        
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
                      echo "<td style='background-color:".generarColor()."'></td>";
                  }
          
                echo "</tr>";
            } 
        
        echo "</tbody>
              </table>";
        
    ?>
</body>

</html>