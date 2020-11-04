<html>
<head>
</head>
<body>

<?php //----- Si metodo GET -> muestra formulario y si es POST -> Valida y procesa el formulario

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<form method='POST'>
        		Introduce tu numero de DNI<br><br>
                <input name='dni' type='number'><br><br>
        	
        		<input type='submit' value='Generar Letra'>
	          </form>";
    }else{   
        
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        
        if(!empty($_POST['dni'])){
            
            $dni = $_POST['dni'];
          
            if(is_numeric($dni)){
                
                $indice = $dni % 23;
                
                echo "La letra correspondiente a tu DNI es la ".$letras[$indice];
                
            }else{
                echo "El DNI introducido no es válido.";
            }

        }else{
            echo "No has introducido ningún DNI.";
        }
                
    }  
?>
</body>
</html>
