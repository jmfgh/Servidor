<?php

class Coche
{
    // Definir los atributos
    private $modelo;
    private $distanciaTotal;
    private $distanciaParcial;
    private $motor;
    private $velocidad;
    private $velocidadMax;
    
    // Completar los métodos
    
    function __construct ( String $modelo, int $velocidadMax){
        $this->modelo = $modelo;
        $this->distanciaTotal = 0;
        $this->distanciaParcial = 0;
        $this->motor = false;
        $this->velocidad = 0;
        $this->velocidadMax = $velocidadMax;   
    }
    
    public function arrancar():bool{
        $ok = false;
        
        if(!$this->motor){
            $this->motor = true;
            $ok = true;
        }else{
            $this->infoError("El coche ya esta arrancado.");
        }
        
        return $ok;
    }
    
    public function parar():bool{
        $ok = false;
        
        if($this->motor){
            $this->motor = false;
            $this->distanciaParcial = 0;
            $this->velocidad= 0;
            $ok = true;
        }else{
            $this->infoError("El coche ya esta parado.");
        }
        
        return $ok;
    }
    
    public function acelera( int $cantidad):bool{
        if ( $this->motor){
            $this->velocidad = $this->velocidad + $cantidad;
            // Control de la velocidad Máxima
            if ( $this->velocidad > $this->velocidadMax){
                $this->velocidad = $this->velocidadMax;
            }
            return true;
        }
        else{
            $this->infoError(" Motor parado. No se puede acelerar");
            return false;
        }
    }
    
    public function frena ( int $cantidad):bool{
        $ok = false;
        
        if($this->motor && ($this->velocidad != 0)){
            $this->velocidad -= $cantidad;
            if($this->velocidad < 0){
                $this->velocidad = 0;
            }
            $ok = true;
        }else{
            $this->infoError("El coche no puede frenar.");
        }
        
        return $ok;
    }
    
    public function recorre ():bool{
        $ok = false;
        
        if($this->motor){
            $this->distanciaParcial += $this->velocidad;
            $this->distanciaTotal += $this->velocidad;
            $ok = true;
        }else{
            $this->infoError("El coche no puede avanzar.");
        }
        
        return $ok;
    }
    
    public function info():string{
        $mensaje = "";
        $estado = ($this->motor)? "Arrancado" : "Parado";
        
        $mensaje .= "<br>Modelo: ".$this->modelo."<br>";
        $mensaje .= "<br>Velocidad:  ".$this->velocidad."<br>";
        $mensaje .= "<br>Estado: ".$estado."<br>";
        $mensaje .= "<br>Km parciales:  ".$this->distanciaParcial."<br>";
        $mensaje .= "<br>Km totales:  ".$this->distanciaTotal."<br>";
        
        return $mensaje;
    }
    
    public function getKilometros():int{
        return $this->distanciaParcial;
    }
    
    private function infoError( String $mensaje):void{
        echo $mensaje;
    }
    
    static function compara (Coche $a,Coche $b){
        return $a->getKilometros() - $b->getKilometros();
    }
}

