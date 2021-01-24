<?php

class Usuario
{
    private $user;
    private $clave;
    private $nombre;
    private $email;
    private $plan;
    private $estado;
    
    // Getter con m�todo m�gico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    // Setter con m�todo m�gico
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }
    
}