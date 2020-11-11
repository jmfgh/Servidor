<html>
<head>
</head>
<body>

<?php //----- Si metodo GET -> muestra formulario y si es POST -> Valida y procesa el formulario

function hayMayusculas ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( ctype_upper($valor[$i]) )
            return true;
    }
    return false;
}

function hayMinusculas ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( ctype_lower($valor[$i]))
            return true;
    }
    return false;
}

function hayDigito ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( ctype_digit($valor[$i]) )
            return true;
    }
    return false;
}

function hayAlfanumerico ($valor){
    for ($i=0; $i<strlen($valor); $i++){
        if ( !ctype_alnum($valor[$i]) )
            return true;
    }
    return false;
}
    
function comprobarContras($clave1, $clave2) :bool{
        $ok = true;
        
        if ( $clave1 != $clave2 ){
            echo " Las contraseÒas deben ser iguales ";
            $ok = false;
        }
        
        if ( strlen($clave1) < 8 ){
            echo "TamaÒo de la contraseÒa debe ser igual o superior a 8 caracteres en total";
            $ok = false;
        }
        
        if ( !hayMayusculas($clave1) || !hayMinusculas($clave1)){
            echo " Debe haber may˙sculas y min˙sculas. ";
            $ok = false;
        }
        if ( !hayDigito($clave1)){
            echo " Debe haber algun dÌgito.";
            exit;
        }
        
        if ( !hayAlfanumerico($clave)){
            echo " No hay nig˙n caracter no alfanumÈrico ";
            $ok = false;
        }

        return $ok;
}


    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<form method='POST'>
        		Introduce tu nombre<br><br>
                <input name='nombre' type='text' required><br><br>

        		Introduce tu mail<br><br>
                <input name='mail' type='email' required><br><br>

        		Contrase√±a<br><br>
                <input name='clave1' type='password' required><br><br>

        		Repite la contrase√±a<br><br>
                <input name='clave2' type='password' required><br><br>
        	
        		<input type='submit' value='Registrarse'>
	          </form>";
    }else{   
        
        if(!empty($_POST['nombre']) && !empty($_POST['mail']) && !empty($_POST['clave1']) && !empty($_POST['clave2'])){
            
            $nombre = $_POST['nombre'];
            $mail = $_POST['mail'];
            $clave1 = $_POST['clave1'];
            $clave2 = $_POST['clave2'];
            
            if(comprobarContras($clave1, $clave2) && filter_var($mail, FILTER_VALIDATE_EMAIL)){
                echo " Usuario registrado. Bienvenid@ ".$nombre;
            }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                echo "ERROR: No has introducido un correo electr√≥nico v√°lido.";
            }             

        }else{
            echo "ERROR: No has rellenado todos los campos.";
        }
                
    }  
?>
</body>
</html>
