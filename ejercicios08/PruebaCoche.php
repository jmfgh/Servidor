/*
 *  CLASE DE PRUEBA: Realiza una simulacion sencilla de una carrera de coches
 */

<?php
include_once "Coche.php";

const META = 500;         // 500 kil�metros
$parrilla = [];            // Array de coches con 5 coches

// Creo 5coches
$parrilla [0] = new Coche("Ferrari",300);
$parrilla [1] = new Coche("600",100);
$parrilla [2] = new Coche("BMW",220);
$parrilla [3] = new Coche("Seat",150);
$parrilla [4] = new Coche("La Cabra",10);

// Test de pruebas todos deben generar errores

$c1 = $parrilla[0];
$c2 = $parrilla[1];
$c1->acelera(10);
$c2->frena(20);
$c1->parar();
$c2->recorre();

// Arranquen los motores
for ($i=0; $i<count($parrilla); $i++){
    $parrilla[$i]->arrancar();
}

// Comienza la carrera !!!!
do {
    for ($i = 0; $i <count($parrilla); $i++) {
        $parrilla[$i]->acelera(random_int(0, 20));
        $parrilla[$i]->recorre();
        $parrilla[$i]->frena(random_int(0,10));
        echo "<br>".$parrilla[$i]->info();
    }
    
} while ( ! alcanzarMeta( $parrilla, META) );


// Ordena la tabla para mostrar la clasificaci�n
ordenarClasificacion( $parrilla);

// Muestra la clasificaci�n
for($i=0; $i<count($parrilla); $i++){
    echo ($i+1)."� Clasificado ". $parrilla[$i]->info()."<br>";
}

// M�TODOS AUXILIARES
// Devuelve verdadero si hay algun coche que haya recorrido la distancia indicada.

function alcanzarMeta( array $tcoches, int $distancia):bool{
   
   for ($i = 0; $i < count($tcoches); $i++) {
       if ($tcoches[$i]->getKilometros() == $distancia){
           return true;
       }
   }
   
   return false;
    
}

// Ordeno la tabla de objetos por los kilometros recorridos
function ordenarClasificacion( array $tcoches):void{
    
        usort($tcoches, array ("Coche","compara"));
}
