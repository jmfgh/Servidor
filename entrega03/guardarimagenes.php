<html>
<head>
<style>
    h1{
        background-color: blue;
        color: white;
        padding: 15px;
    }
    h2{
        background-color: green;
        color: white;
        padding: 15px;
    }
    
    div{
        text-align: center;
    }

</style>
</head>
<body>

<?php //Si método GET -> muestra formulario y si es POST -> Valida y procesa el formulario

    // Posibles errores de subida segun el manual de PHP
    $codigosErrorSubida= [
    0 => 'Subida correcta',
    1 => 'El tamaño del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini
    2 => 'El tamaño del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML
    3 => 'El archivo no se pudo subir completamente',
    4 => 'No se seleccionó ningún archivo para ser subido',
    6 => 'No existe un directorio temporal donde subir el archivo',
    7 => 'No se pudo guardar el archivo en disco',  // permisos
    8 => 'Una extensión PHP evito la subida del archivo'  // extensión PHP
    ]; 
    
    $directorio = 'C:\Users\jmfgh\OneDrive\Desktop\DAW\SERVIDOR\imgusers';
    
    function comprobarFormato($formato) {
        if($formato == "image/png" || $formato == "image/jpeg"){
            return true;
        }else{
            return false;
        }
    }
    
    function comprobarTamanio($tamanio, $tamanioMax) {

        if($tamanio <= 200000 && $tamanio <= $tamanioMax){
            return true;
        }else{
            return false;
        }
    }
    
    function comprobarNombre($directorio, $nombre) {
        
        $fichero = $directorio.'/'.$nombre;
        
        if(file_exists($fichero)){
            return true;
        }else{
            return false;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<div><h1>Formulario para subir imagenes</h1></div>
                <form method='POST' action='guardarimagenes.php' enctype='multipart/form-data'>
                    <input type='hidden' name='MAX_FILE_SIZE' value='200000' /> <!--  200Kbytes -->
                    
                    <label>Imagen 1</label> <input name='imagen1' type='file' /> <br>
                    <label>Imagen 2</label> <input name='imagen2' type='file' /> <br><br>
                    
                    <input type='submit' value='Subir archivo'/>
	          </form>";
    }else{    
        
        $mensaje = '';
        $imagenes = [];
        $tamanioTotal = 0;
        $num = 0;
        
        // si no se reciben el directorio de alojamiento y el archivo, se descarta el proceso
        // se reciben el directorio de alojamiento y el archivo
        
        foreach ($_FILES as $valor){
            if((isset($valor['name']))){
                $num++;
                $imagenes[] = 'imagen'.$num;  
            }
        }
            
            // Compruebo el directorio y que tengo permisos
            if ( is_dir($directorio) && is_writable ($directorio)) {
            
                for ($i = 0; $i < count($imagenes); $i++) {
                    
                    // Información sobre las imágenes subidas
                    $nombreFichero   =   $_FILES[$imagenes[$i]]['name'];
                    $tipoFichero    =   $_FILES[$imagenes[$i]]['type'];
                    $tamanioFichero  =   $_FILES[$imagenes[$i]]['size'];
                    $temporalFichero =   $_FILES[$imagenes[$i]]['tmp_name'];
                    $errorFichero    =   $_FILES[$imagenes[$i]]['error'];
                    $tamanioTotal += $tamanioFichero;
                    
                    $mensaje .= 'Intentando subir el archivo: ' . ' <br>';
                    $mensaje .= "- Nombre: $nombreFichero" . ' <br>';
                    $mensaje .= '- Tamaño: ' . number_format(($tamanioFichero / 1000), 1, ',', '.'). ' KB <br>';
                    $mensaje .= "- Tipo: $tipoFichero" . ' <br>' ;
                    $mensaje .= "- Nombre archivo temporal: $temporalFichero" . ' <br>';
                    $mensaje .= "- Código de estado: $errorFichero" . ' <br>';
                    
                    $mensaje .= '<br><div><h2>Resultado '.$imagenes[$i].'</h2></div><br>';
                    
                    // Obtengo el código de error de la operación, 0 si todo ha ido bien
                    if ($errorFichero > 0) {
                        $mensaje .= "Se ha producido el error nº $errorFichero: <em>"
                        . $codigosErrorSubida[$errorFichero] . '</em> <br>';
                    } else { // subida correcta del temporal
                        
                        $todoOK = false;
                        
                        //Comprobación de que es un fichero de imagen y que no se excede el tamaño total de subida
                        if(comprobarFormato($tipoFichero)){
                            $todoOK = true;
                        }else{
                            $todoOK = false;
                            $mensaje .= 'ERROR: El archivo debe ser una imagen con extensión PNG o JPG <br><br>';
                        }
                         
                        //Comprobación de que no se excede el tamaño de subida
                        if(comprobarTamanio($tamanioTotal, 300000)){
                            $todoOK = true;
                        }else{
                            $todoOK = false;
                            $mensaje .= 'ERROR: Se excede el tamaño de subida de imágenes <br><br>';
                        }
                             
                        //Comprobación de que no existe ya un fichero con ese nombre
                        if(!comprobarNombre($nombreFichero, $directorio)){
                            $todoOK = true;
                        }else{
                            $todoOK = false;
                            $mensaje .= 'ERROR: Ya existe un archivo con el mismo nombre <br><br>';
                        }
                        
                        if($todoOK){
    
                            //Intento mover el archivo temporal al directorio indicado
                            if (move_uploaded_file($temporalFichero,  $directorio .'/'. $nombreFichero)) {
                                $mensaje .= 'Imagen guardada en: ' . $directorio .'/'. $nombreFichero . ' <br><br>';
                            } else {
                                $mensaje .= 'ERROR: Fallo al guardar la imagen <br><br>';
                            }
                        }
                     }            
                }
            
            } else {
                $mensaje .= 'ERROR: No es un directorio correcto o no se tiene permiso de escritura <br><br>';
            }   
        
        echo $mensaje;
        echo "<br><br><input type='button' value='Volver' onClick='history.go(-1);'>";
                 
    } 

?>
</body>
</html>
