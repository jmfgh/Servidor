<?php


class Canario
{
     use Ejemplotrait;
     private $color;
     
     static private $numcanarios;
     
     static function comoEsElCanto(){
         echo " PIooooo PIoooo";
     }
     
     function __construct ( $color){
         $this->color = $color;
        
       
     }
     
     
     
     public function __toString(){
         return
         "Color  = ".$this->color." <br>".
         "Precio    = ".$this->getprecio()." Euros <br>";
         
     }
   
     
}

