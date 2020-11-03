<?php
function usuarioOk($usuario, $contra, $usuarios) :bool {
  
    return (strlen($usuario) >= 8 && in_array($usuario, $usuarios) && $contra == strrev($usuario));
    
}

function letraMasRepetida($comentario) :string{
    $max = 0;
    
    $letras = count_chars($comentario, 1);
    
    foreach ($letras as $letra => $veces) {
        if($veces > $max && ctype_alnum($letra)){
            $max = $letra;
        }
    }
    
    return chr($max);
}

function palabraMasRepetida($comentario) :string{
    
    $palabras = str_word_count($comentario, 1, 'áéíóúÁÉÍÓÚ');
    $palabras = array_count_values($palabras);
    arsort($palabras);
    return array_key_first($palabras);
 
}
