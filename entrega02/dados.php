<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .dados{
        font-size: 5em;
    }
    
    .rojo{
        background-color: red;
    }
    
    .azul{
        background-color: lightblue;
    }
    
  </style>
</head>

<body>

<?php

    define ('UNOS',  "&#x2680;");
    define ('DOSES',  "&#x2681;");
    define ('TRES',  "&#x2682;");
    define ('CUATRO',  "&#x2683;");
    define ('CINCO',  "&#x2684;");
    define ('SEIS',  "&#x2685;");

    
    function generarTirada(){
        
        $resu = [];
        
        for ($i = 0; $i <= 4; $i++) {
           $resu[] = random_int(1,6);
        }
        return $resu;
    }    
    
    function sumarResultado($tabla){
        
        $suma = 0;
        $max = 1;
        $min = 6;
        
        foreach ($tabla as $value) {
            $suma += $value;
            if($value >= $max){
                $max = $value;
            }elseif ($value <= $min){
                $min = $value;
            }
        }
        
        return ($suma - ($max + $min));
    }
    
    function pintarDados($tabla, $resu) {
        
        $dado = "";
        
        foreach($tabla as $value){
            
            switch ($value) {
                case 1:
                    $dado = UNOS;
                    break;
                case 2:
                    $dado = DOSES;
                    break;
                case 3:
                    $dado = TRES;
                    break;
                case 4:
                    $dado = CUATRO;
                    break;
                case 5:
                    $dado = CINCO;
                    break;
                case 6:
                    $dado = SEIS;
                    break;  
            }
            
            echo  "<td class='dados'>".$dado."</td>";
        }  
    }
    
    function calcularGanador($valor1, $valor2){ 
        
        $resu = "";
        
        if($valor1 == $valor2){
            $resu = "Ha habido un empate.";
        }elseif ($valor1 > $valor2){
            $resu = "Ha ganado el jugador 1.";
        }else{
            $resu = "Ha ganado el jugador 2.";
        }
    
        return $resu;
    }
    
    echo "Actualiza la pagina para realizar una nueva tirada";
    
    $tiradaJ1 = generarTirada();
    $tiradaJ2 = generarTirada();
    $sumaJ1 = sumarResultado($tiradaJ1);
    $sumaJ2 = sumarResultado($tiradaJ2);
    
    echo "<table>
              <tbody>
                <tr class='rojo'>
                  <th>Jugador 1</th>";
    
    pintarDados($tiradaJ1, $sumaJ1);
    
            echo "<th>".$sumaJ1." puntos</th>
                </tr>
                <tr class='azul'>
                  <th>Jugador 2</th>";

    pintarDados($tiradaJ2, $sumaJ2);
                 
            echo "<th>".$sumaJ2." puntos</th>
                </tr>
                <tr>
                  <th>Resultado</th>
                  <td colspan= '6'>".calcularGanador($sumaJ1, $sumaJ2)."</td>
                </tr>
              </tbody>
           </table>";

?>
</body>
</html>