<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      
      th, td {
        padding: 5px;
        text-align: center;
      }
      
      span{
        font-size: 150px;
      }
      
      div{
        text-align: center;
      }
      
      th, strong{
        font-size: 30px;
      }

  </style>
</head>

<body>

<?php

    define ('PIEDRA1',  "&#x1F91C;");
    define ('PIEDRA2',  "&#x1F91B;");
    define ('TIJERAS',  "&#x1F596;");
    define ('PAPEL',    "&#x1F91A;" );
    define ('PRIMERO',    1 );
    define ('SEGUNDO',    2 );
    define ('UNO',    "Ha ganado el jugador 1");
    define ('DOS',    "Ha ganado el jugador 2");
    define ('EMPATE',    "Ha habido un empate");

    
    function obtenerMano($jugador){
        
        $num = random_int(0,2);
        $resu = 0;
        
        switch ($num) {
            case 0:
                    if($jugador == PRIMERO){
                        $resu = PIEDRA1;
                    }else{
                        $resu = PIEDRA2;
                    }
                break;
            case 1:
                    $resu = TIJERAS;
                break;
            case 2:
                $resu = PAPEL;
                break;
        }
        
        return $resu;
    }
    
    function calcularGanador($valor1, $valor2){

        $mensaje = "";
        
        switch ($valor1) {
            
            case PIEDRA1:
        
                switch ($valor2) {
                    case PIEDRA2:
                        $mensaje = EMPATE;
                        break;
                    case PAPEL:
                        $mensaje = DOS;
                        break;
                    case TIJERAS:
                        $mensaje = UNO;
                        break;
                };
                break;
            case PAPEL:
                
                switch ($valor2) {
                    case PIEDRA2:
                        $mensaje = UNO;
                        break;
                    case PAPEL:
                        $mensaje = EMPATE;
                        break;
                    case TIJERAS:
                        $mensaje = DOS;
                        break;
                };
                break;
            case TIJERAS:
                
                switch ($valor2) {
                    case PIEDRA2:
                        $mensaje = DOS;
                        break;
                    case PAPEL:
                        $mensaje = UNO;
                        break;
                    case TIJERAS:
                        $mensaje = EMPATE;
                        break;
                };

        } 
        
        return $mensaje;
    }
    
    $mano1 = obtenerMano(PRIMERO);
    $mano2 = obtenerMano(SEGUNDO);
    
    echo "<h1>¡Piedra, Papel, Tijera!</h1>

            <p>Actualice la pagina para mostrar otra partida</p><br>

            <table>
                <thead>
                    <tr>
                        <th>Jugador 1</th>
                        <th>Jugador 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>".$mano1."</span></td>
                        <td><span>".$mano2."</span></td>
                    </tr>
                </tbody>
               <tfoot>
                    <tr><th colspan='2'>".calcularGanador($mano1, $mano2)."</th></tr>
                </tfoot>
            </table>";

?>
</body>
</html>