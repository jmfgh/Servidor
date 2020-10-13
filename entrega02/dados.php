<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

  </style>
</head>

<body>

<?php

    define ('uno',  "&#x2680;");
    define ('dos',  "&#x2681;");
    define ('tres',  "&#x2682;");
    define ('cuatro',  "&#x2683;");
    define ('cinco',  "&#x2684;");
    define ('seis',  "&#x2685;");

    
    function generarTirada(){
        
        $resu[];
        
        for ($i = 0; $i < 6; $i++) {
           $resu[random_int(0,6)];
        }
 
        return $resu;
    }
    
    var_dump(generarTirada());

    echo "<table>
              <tbody>
                <tr>
                  <th>Jugador 1</th>
                  <td style='padding:10px; background-color: red;'>
    
                  </td>
                    <th>12 puntos</th>
                  </tr>
                <tr>
                  <th>Jugador 2</th>
                  <td style='padding: 10px; background-color: blue;'>
    
                  </td>
                  <th>11 puntos</th>
                </tr>
                <tr>
                  <th>Resultado</th>
                  <td>Ha ganado el jugador 1</td>
                </tr>
              </tbody>
           </table>";

?>
</body>
</html>