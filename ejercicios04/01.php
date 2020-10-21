<?php 

function mostrarFormulario(){
    echo "<html>
            <body>
            	<form method=\"POST\">
            		<input type=\"text\" name=\"usu\"> Usuario
            		<input type=\"password\" name=\"contra\"> Password
            		<input type=\"submit\" value=\"Enviar\">
            	</form>
            </body>
          </html>";
}

    $registro = ["jose" => "1234", "alumno" => "alumno", "root" => "A2020"];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){    
    
        $usuario = $_REQUEST["usu"];
        $clave = $_REQUEST["contra"];
        
        if (key_exists($usuario, $registro)) {
            if($registro[$usuario] == $clave){
                echo "Bienvenido ".$usuario;
            }else{
               echo "Password incorrecta.";
               mostrarFormulario();
            }
        }else{
            echo "Nombre de usuario incorrecto:";
            mostrarFormulario();
        }
    }else{
        mostrarFormulario();
    }
?>
