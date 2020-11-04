<html>
<head>
</head>
<body>

<?php //----- Si metodo GET -> muestra formulario y si es POST -> Valida y procesa el formulario
    
    function comprobarContras($clave1, $clave2) :bool{
        $ok = false;
        
        if ($clave1 == $clave2){
            
            if(strlen($clave1) >= 8){
                ;
            }
            
        }else{
            echo "ERROR: Las contraseñas no coinciden";
        }
        
        return $ok;
    }


    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<form method='POST'>
        		Introduce tu nombre<br><br>
                <input name='nombre' type='text' required><br><br>

        		Introduce tu mail<br><br>
                <input name='mail' type='email' required><br><br>

        		Contraseña<br><br>
                <input name='clave1' type='password' required><br><br>

        		Repite la contraseña<br><br>
                <input name='clave2' type='password' required><br><br>
        	
        		<input type='submit' value='Registrarse'>
	          </form>";
    }else{   
        
        if(!empty($_POST['nombre']) && !empty($_POST['mail']) && !empty($_POST['clave1']) && !empty($_POST['clave2'])){
            
            $nombre = $_POST['nombre'];
            $mail = $_POST['mail'];
            $clave1 = $_POST['clave1'];
            $clave1 = $_POST['clave2'];
            
            if(comprobarContras($clave1, $clave2) && filter_var($mail, FILTER_VALIDATE_EMAIL)){
                echo " Usuario registrado. Bienvenid@ ".$nombre;
            }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                echo "ERROR: No has introducido un correo electrónico válido.";
            }             

        }else{
            echo "ERROR: No has rellenado todos los campos.";
        }
                
    }  
?>
</body>
</html>
