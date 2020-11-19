<html>
<head>
<meta charset="UTF-8">
<title>Ver fichero</title>
</head>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['fichero'])){
        if(stripos($_POST['fichero'], ".") > 0){
                $tipo = explode(".", $_POST['fichero']);
                if($tipo[1] == "html" || $tipo[1] == "php" || $tipo[1] == "txt"){
                    if (is_readable($_POST['fichero']) ){
                        $fichero = @fopen($_POST['fichero'],"r") or die ("Error al abrir el fichero.");
                        echo "<code>";
                        while ($linea = fgets($fichero)) {
                            echo $linea."<br>";
                        }
                        fclose($fichero);
                        echo "</code>";
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