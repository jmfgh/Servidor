<?php

function elMayor($a, $b, &$c){
    
    if($a == $b){
        $c = 0;
    }elseif($a > $b){
        $c = $a;
    }else{
        $c = $b;
    }
  return $c;
}
   echo elMayor(1, 1, $c)."</br>";
   echo elMayor(2, 1, $c)."</br>";
   echo elMayor(2, 4, $c);
?>