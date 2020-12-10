<?php
define('FICHERO', 'incidencias.txt');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   $nombre = "";
   $resumen = "";
   $prioridad = 0;
   $hora = date('h : i : s');
   $fecha = date('j - n - Y');
   $ip = gethostbyname('localhost');
    
  if (isset($_POST['nombre'])) {
      $nombre = strip_tags($_POST['nombre']);
  }
  
  if (isset($_POST['resumen'])) {
      $resumen = strip_tags($_POST['resumen']);
  }

  if (isset($_POST['prioridad'])) {
      $prioridad = $_POST['prioridad'];
  } 
    
}

    if (is_file(FICHERO) && is_readable(FICHERO) ) {

        $cadena = $fecha." ".$hora.", ".$nombre.", ".$resumen.", ".$prioridad.", ".$ip."\n";
        $ok = file_put_contents(FICHERO, $cadena, FILE_APPEND);
        echo ($ok) ? "Muchas gracias $nombre, se ha anotado su incidencia." : "Error al añadir datos";

    } else {
        echo " Error : El fichero ".FICHERO." no existe o no tiene permisos de lectura.";
    }
