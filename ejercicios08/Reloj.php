<?php

class Reloj
{
    private $hora;
    private $min;
    private $seg;
    private $segundos;
    private $formato24;
    private $alarma;
    private $activada;
    
    public function __construct ( int $hora, int $minutos, int $segundos, bool $formato24 = TRUE){
        $this->hora = $hora;
        $this->min = $minutos;
        $this->seg = $segundos;
        $this->segundos = 0;
        $this->formato24 = $formato24;
        $this->alarma = 0;
        $this->activada = false;
        
    }
    
    // Mostrar la hora: genera un String con el  formado de hora  22:30:23
    // o 10:30:23 pm si el atributos Formato24 es falso
    
    public function mostrar():string{
        
        $mensaje = $this->formato24? $this->hora : $this->hora - 12;
        $mensaje.= ":".$this->min.":".$this->seg;

        return $mensaje;
    }
    
    // Cambiar formato24, recibe un valor true si quiero formato de
    // 24 o falso si quiero de 12
    public function cambiarFormato24( bool $formato24){
        $this->formato24 = $formato24;
    }
    
    // Incrementa en un segundo el valor de reloj
    public function tictac (){
        $this->seg++;
        $this->segundos++;
        
        if($this->seg >= 60){
            $this->seg = 0;
            $this->min++;
        }
        
        if($this->min >= 60){
            $this->seg = 0;
            $this->min = 0;
            $this->hora++;
        }
        
        if(($this->formato24 && $this->hora >= 24) || (!$this->formato24 && $this->hora >= 12)){
            $this->seg = 0;
            $this->min = 0;
            $this->hora = 0;
        }
        
        if($this->segundos >= 86400){
            $this->segundos = 0;
        }
        
        if(($this->segundos == $this->alarma) && $this->activada){
            echo "<br>RIIIIINNNGGG! Son las ".$this->hora.":".$this->min."<br>";
        }
    }
    
    // Comparar Hora, recibe como parámetro otro objeto Reloj
    // y me devuelve el número de segundos que tienen de diferencia
    
    public function comparar ( Reloj$otroreloj){
        return $this->segundos - $otroreloj->segundos;
    }
    
    public function fijarAlarma(int $hora, int $min) {
        $this->alarma += ($hora*3600);
        $this->alarma += ($min*60);
    }
    
    public function activarAlarma(bool $activa){
        $this->activada = $activa;
    }
}
