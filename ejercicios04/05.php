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

<?php //----- Si mï¿½todo GET -> muestra formulario y si es POST -> Valida y procesa el formulario

    $resu = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<div><h1>Formulario con multiples campos</h1></div>
                <form method='POST'>

                Nombre: <input name='nombre' type='text'><br><br>
                Apellidos: <input name='apellidos' type='text'><br><br>
                Edad: <select name='anyos' size='1'>
						<option value='17'>Menor de 18</option>
						<option value='54'>Menor de 55</option>
						<option value='56'>Mayor de 55</option>
					 </select><br><br>
        		
                Sexo:
        		<input type='radio' name='sexo' value='H'> Hombre
        		<input type='radio' name='sexo' value='M'> Mujer <br><br>	

                Hobbies:<br>
			    <input name='hobbies[]' value='la lectura' type='checkbox' >lectura<br> 
			    <input name='hobbies[]' value='ver la tele' type='checkbox'>ver la tele<br>
			    <input name='hobbies[]' value='hacer deporte' type='checkbox'>hacer deporte<br>
                <input name='hobbies[]' value='salir de marcha' type='checkbox'>salir de marcha<br><br>
	          
                <input type='submit' value='Enviar'>
                </form>";
    }else{     
            
            $nombre = (isset($_POST["nombre"]))? strip_tags($_POST["nombre"]) : "Ninguno introducido.";
            $apellidos = (isset($_POST["apellidos"]))? strip_tags($_POST["apellidos"]) : "Ninguno introducido.";
            $anyos = (isset($_POST["anyos"]))? $_POST["anyos"] : "Ninguno seleccionado.";
            $sexo = (isset($_POST["sexo"]))? $_POST["sexo"] : "Ninguno seleccionado.";
            
            $hobbies = [];
            
            if(isset($_POST["hobbies"])){
                foreach ($_POST["hobbies"] as $hobbie){
                    $hobbies[] = $hobbie;
                }
            }
            
            $mensaje = "Bienvenid";
            
            if($sexo == "H"){
                $mensaje.= "o ";
                if($anyos > 55){
                    $mensaje.= "D ";
                }
            }else{
                $mensaje.= "a ";
                if($anyos > 55){
                    $mensaje.= "Dña ";
                }
            }
            
            $mensaje.= $nombre." ".$apellidos.", ";
            
            if(count($hobbies) == 0){
                $mensaje.= "no tiene aficiones de nuestra lista";
            }elseif(count($hobbies) == 1){
                $mensaje.= "su unica aficion es ".$hobbies[0];
            }else{
                $mensaje.= "sus aficiones son ".implode(" y ", $hobbies);
            }
      
            $mensaje.=".";
                    
            echo $mensaje."<br><br>
                 <input type='button' value='volver' onClick='history.go(-1);'>";   
    }
?>
</body>
</html>
