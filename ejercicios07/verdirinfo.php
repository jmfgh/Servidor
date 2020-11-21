<html>
<head>
<meta charset="UTF-8">
<title>Ver directorio</title>
</head>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['dir'])){
        $directorio = $_POST['dir'];
        
        if (! is_dir($directorio)) // Comprueba que realmente existe el directorio
            die("No existe el directorio $directorio");
            
            // Abrimos el directorio
            $dir_cursor = @opendir($directorio) or die("Error al abrir el directorio");
            
            $lista= [];
            // Mostramos cada entrada del directorio
            
            echo "<table border=1>";
            echo "<tr><th>Nombre</th><th>Tamaño</th></tr>";
            $entrada = readdir($dir_cursor); // lee primera entrada
            while ($entrada !== false) // mientras haya datos
            {
                if (is_file($directorio . "/" .$entrada)) {
                    $tamaño = filesize($directorio . "/" . $entrada);
                    $lista[$entrada] = $tamaño;
                } else{
                    echo "<tr><td> $entrada</td><td> Directorio </td></tr>";
                }
                
                $entrada = readdir($dir_cursor); // lee siguiente entrada
            }
            
            arsort($lista);
            foreach ($lista as $entrada => $tamaño){
              echo "<tr><td> $entrada</td><td> : $tamaño </td></tr>";  
            }
            echo "</table>";
            
            closedir($dir_cursor); // cerramos el directorio

        
    }else{
        echo "No has indicado ningun directorio.";
        header("Refresh:2");
        exit();
    }
    
}else{
    echo "<form method='post'>
            Indica el nombre de un directorio <input type='text' name='dir'>
          </form>";
}
?>
</body>
</html>