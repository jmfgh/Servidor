<html>
<head>
<style>
	h1{
		background-color: blue;
		color: white;
		padding: 15px;
	}
	div{
		text-align: center;
	}
</style>
</head>
<body>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<div><h1>Formulario con multiples campos</h1></div>
                <form method='POST'>

                Edad: <input name='edad' type='number'><br><br>       		
                Genero:
        		<input type='radio' name='sexo' value='Mujer'> Mujer	 
        		<input type='radio' name='sexo' value='Hombre'> Hombre

                Deportes:<br>
			    <input name='deportes[]' value='Futbol' type='checkbox'>Futbol<br> 
			    <input name='deportes[]' value='Tenis' type='checkbox'>Tenis<br>
			    <input name='deportes[]' value='Ciclismo' type='checkbox'>Ciclismo<br>
                <input name='deportes[]' value='Otro' type='checkbox'>Otro<br><br>
	          
                <input type='submit' nombre='almacenar' value='Almacenar valores'>
                <input type='submit' nombre='eliminar' value='Eliminar valores'>
                </form>";
    }else{     
            
            $edad = (isset($_POST["edad"]))? strip_tags($_POST["nombre"]) : "Ninguno introducido.";
            $sexo = (isset($_POST["sexo"]))? $_POST["sexo"] : "Ninguno seleccionado.";
            
            $deportes = [];
            
            if(isset($_POST["deportes"])){
                foreach ($_POST["deportes"] as $deporte){
                    $deportes[] = $deporte;
                }
            }
              
    }
?>
</body>
</html>