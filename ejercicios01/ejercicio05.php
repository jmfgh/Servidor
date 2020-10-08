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
        color:lightblue;
        background-color:gray;
      }
      
      th, td {
        padding: 5px;
      }
      
      .gris{
        background-color:lightgray;
      }
      
      .der{
        text-align: right;
      }

  </style>

</head>

<body>
    <?php
    
        $num1 = random_int(1,10);
        $num2 = random_int(1,10);
        
        echo "<p>1º Numero:<strong> $num1</strong></p>";
        echo "<p>2º Numero:<strong> $num2</strong></p><br>";
        
        $suma = $num1 + $num2;
        $resta = $num1 - $num2;
        $mul = $num1 * $num2;
        $divi = $num1 / $num2;
        $mod = $num1 % $num2;
        $pot = $num1 ** $num2;
    
        echo "<table>
                <thead>
                    <tr>
                        <th>Operacion</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$num1 + $num2</td>
                        <td class = 'der'>$suma</td>
                    </tr>
                    <tr class='gris'>
                        <td>$num1 - $num2</td>
                        <td class = 'der'>$resta</td>
                    </tr>
                    <tr>
                        <td>$num1 * $num2</td>
                        <td class = 'der'>$mul</td>
                    </tr>
                    <tr class='gris'>
                        <td>$num1 / $num2</td>
                        <td class = 'der'>$divi</td>
                    </tr>
                    <tr>
                        <td>$num1 % $num2</td>
                        <td class = 'der'>$mod</td>
                    </tr>
                    <tr class='gris'>
                        <td>$num1<sup>$num2</sup></td>
                        <td class = 'der'>$pot</td>
                    </tr>
                </tbody>
              </table>";
    ?>
</body>

</html>

