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
        border: 1px solid black;
        color: grey;
      }
      
      thead{
      
      text-align: center;
      
      }
      
      th {
        padding: 15px;
        background-color: blue;
        color: white;
      }
      
      td {
        width: 30px;
        height: 30px;
        padding: 20px;
        font-size: 1.5em;
      }
      
      .der{
        text-align: right;
      }

  </style>

</head>

<body>
    <?php
        
    $num = random_int(1,10);

    echo "<table>
            <thead>
            <tr>
            <th colspan = '2'><h1>Tabla de multiplicar</h1></th>
            </tr>
            <tr>
            <td colspan = '2'>Tabla del ".$num."</td>
            </tr>
            </thead>
            <tbody>";

    for ($i = 1; $i <= 10; $i++) {
     echo "<tr><td>".$num." x ".$i." = </td><td class='der'>".($num * $i)."</td></tr>";
    }

    echo "</tbody>
          </table>";
    
    ?>
</body>

</html>