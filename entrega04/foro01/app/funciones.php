<?php
function usuarioOk($usuario, $contra) :bool {
  
    return (strlen($usuario) >= 8 && $contra == strrev($usuario));
    
}

function letraMasRepetida($comentario) :string{
    $max = 0;
    
    $letras = count_chars($comentario, 1);
    
    foreach ($letras as $letra => $veces) {
        if($veces > $max && $letra != " " && $letra != "," && $letra != "."){
            $max = $veces;
        }
    }
    
    return $letras[$max];
}

function palabraMasRepetida($comentario) :string{
    $max = 0;
    
    $letras = count_chars($comentario, 1);
    
    foreach ($letras as $letra => $veces) {
        if($veces > $max && $letra != " " && $letra != "," && $letra != "."){
            $max = $veces;
        }
    }
    
    return $letras[$max];
}
