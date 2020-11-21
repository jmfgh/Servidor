<html>
<head>
<meta charset="UTF-8">
<title>Ver fichero</title>
</head>
<body>
<?php

function contarPalabras($fichero){
   return str_word_count(file_get_contents($fichero, true), 0);
}

function contarCaracteres($fichero){
    $texto = file_get_contents($fichero, true);
    $cont = 0;
    for ($i = 0; $i < strlen ($texto); $i++) {
          $cont++; 
    }
    
    return $cont;
}

function formatear($fichero){
    $texto = file_get_contents($fichero, true);
    for ($i = 0; $i < strlen ($texto); $i++) {
        if($texto[$i] == "<"){
            $texto[$i] = "&lt;";
        }
        if($texto[$i] == ">"){
            $texto[$i] = "&gt;";
        }
    }
    
    echo "<pre>$texto</pre>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['fichero'])){
        if(stripos($_POST['fichero'], ".") > 0){
                $tipo = explode(".", $_POST['fichero']);
                if($tipo[1] == "html" || $tipo[1] == "php" || $tipo[1] == "txt"){
                    if (is_readable($_POST['fichero']) ){        
                        
                        $fichero = @fopen($_POST['fichero'],"r") or die ("Error al abrir el fichero.");
                        $lineas = 0;

                        while ($linea = fgets($fichero)) {
                            $lineas++;
                            /*echo "<code>$linea</code><br>";*/
                        }
                        fclose($fichero);
                        
                        formatear($_POST['fichero']);
                        
                        echo "Palabras encontradas: ".contarPalabras($_POST['fichero'])."<br>Numero de caracteres: ".contarCaracteres($_POST['fichero'])."<br>Lineas encontradas: $lineas";
           
                    }else{
                        echo "Error: El fichero indicado no existe.";
                        header("Refresh:2");
                        exit();
                    }
                    
                }else{
                    echo "Error: Debes introducir un fichero txt, html o php.";
                    header("Refresh:2");
                    exit();
                } 
        }else{
            echo "Error: Nombre no valido.";
            header("Refresh:2");
            exit();
        }
       
    }else{
        echo "No has indicado ningun fichero.";
        header("Refresh:2");
        exit();
    }
    
}else{
    echo "<form method='post'>
            Indica el nombre de un fichero <input type='text' name='fichero'>
          </form>";
}
?>
</body>
</html>