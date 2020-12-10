<?php

function ingresar($saldo, $importe){
    
    if($importe > 0){
     $saldo = $saldo +$importe;   
     return $saldo; 
    }else{
        echo "Importe Erroneo o importe menor de 0";
    }
  
}

function sacar($saldo, $importe){
    if($importe > 0 && $importe <= $saldo){
        $saldo = $saldo - $importe;
        return $saldo;
    }else{
        echo "Importe Erróneo o importe superior al saldo";
    }
}

function verSaldo($saldo){
    echo "Su saldo actual es de: ".$saldo." euros";
}

