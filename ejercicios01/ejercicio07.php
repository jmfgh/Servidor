<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
      table, td {
        border-collapse: collapse;
      }
      
      td{
        padding: 10px;
      }
     
  </style>

</head>

<body>
    <?php
        
    header("Refresh:5");
    
    $num1 = random_int(100,500);
    $num2 = random_int(100,500);
    $num3 = random_int(100,500);

    echo "<table>
            <tr>
                <td style='width:".$num1."px; background-color: red;'>Rojo(".$num1.")</td>
            </tr>
          </table>
          <table>
            <tr>
                <td style='width:".$num2."px; background-color: green;'>Verde(".$num2.")</td>
            </tr>
          </table>
          <table>
            <tr>
                <td style='width:".$num3."px; background-color: blue;'>Verde(".$num3.")</td>
            </tr>
          </table>";
    
    ?>
</body>

</html>