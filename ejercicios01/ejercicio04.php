<?php
$gener = 0;
$time_start = microtime(true);
$cont = 0;

do{
    $num = random_int(1,10);
    $gener++;
    
    echo "Ha salido el $num <br>";
    
        if($num == 6){
            $cont++;
        }else{
            $cont = 0;
        }
    
   }while($cont != 3);
   
   $time_end = microtime(true);
   $tiempo = $time_end - $time_start;
   
   echo "Han salido tres 6 seguidos tras generar $gener números en $tiempo milisegundos";
?>