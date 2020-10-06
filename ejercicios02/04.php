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
        border-collapse: collapse;
      }
      
      th{
        color:white;
        background-color:black;
      }
      
      th, td {
        padding: 5px;
      }

  </style>

</head>

<body>
    <?php
    define('CINCUENTA', 50);
    define('CIEN', 100);
    
    $min = 100;
    $max = 0;
    $sum = 0;
    
        for ($i = 0; $i < CINCUENTA; $i++) {
            $num = random_int(1,CIEN);
            $sum += $num;
            
            if($num > $max){
                $max = $num;
            }
            
            if($num < $min){
                $min = $num;
            }
        }
        
        $media = $sum / CINCUENTA;
    
        echo "<table>
                <thead>
                <th>Generacion de ".CINCUENTA." valores aleatorios</th>
                </thead> 
                <tbody>
                    <tr>
                        <td>Minimo</td>
                        <td>$min</td>
                    </tr>
                    <tr>
                        <td>Maximo</td>
                        <td>$max</td>
                    </tr>
                    <tr>
                        <td>Media</td>
                        <td>$media</td>
                </tbody>
              </table>";
    ?>
</body>

</html>

