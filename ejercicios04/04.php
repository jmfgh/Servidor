<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
	h1{
		background-color: blue;
		color: white;
		padding: 15px;
	}
	p{
		color: grey;
	}
	div{
	text-align: center;
    }
</style>
</head>
<body>

	<div><h1>Procesando Formulario</h1></div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nombre = (isset($_POST["nombre"]))? $_POST["nombre"] : "Ninguno introducido.";
    $clave = (isset($_POST["clave"]))? $_POST["clave"] : "Ninguna introducida.";
    $color = (isset($_POST["color"]))? $_POST["color"] : "Ninguno introducido.";
    $publicidad = (isset($_POST["publicidad"]))? "SI" : "NO";
    $idiomas = []; 
    $codigosPostales = []; 
    $comentario = (isset($_POST["textarea"]))? $_POST["textarea"] : "Ningun comentario.";
    
    if(isset($_POST["idiomas"])){
        foreach ($_POST["idiomas"] as $idioma){
            $idiomas[] = $idioma;
        }
    }else{
        $idiomas[] = "Ninguno seleccionado";
    }
    
    $anyo = $_POST["anyo"];
    
    if(isset($_POST["ciudades"])){
        foreach ($_POST["ciudades"] as $cp){
            $codigosPostales[] = $cp;
        }
    }else{
        $codigosPostales[] = "Ninguno seleccionado";
    }
    
    echo "<p>Nombre: ".$nombre."</p>
          <p>Clave: ".$clave."</p>  
          <p>Semaforo: ".$color."</p>
          <p>Publicidad: ".$publicidad." publicidad</p>
          <p>Idiomas: ";
    
        foreach ($idiomas as $value) {
            echo $value.". ";
        }
          
    echo "</p>
          <p>A�o de estudios: ".$anyo."</p>
          <p>Lista de los codigos postales de provincias: ";
          
        foreach ($codigosPostales as $codigo) {
            echo $codigo." ";
        }
          
    echo "</p>
          <p>Comentarios: ".$comentario."</p>";

}else{
    header("refresh:0;url=04.html");
}


?>
</body>
</html>