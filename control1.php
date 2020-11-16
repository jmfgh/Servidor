<html>
<head>
<meta charset="UTF-8">
<title>Palabra Oculta</title>
</head>
<body>
<?php
    define ('MAXFALLOS',5);
    session_start();
    
    function elegirPalabra(){
        static $tpalabras = ["Madrid","Sevilla","Murcia","Malaga","Mallorca","Menorca"];
        $num = random_int(0,5);
        
        return $tpalabras[$num];
    }
    
    function comprobarLetra($letra,$cadena){

        for ($j = 0; $j<strlen($cadena); $j++){
            if(strtoupper($letra) == $cadena[$j] || strtolower($letra) == $cadena[$j]){
                return true;
            }
        }

        return false;
    }
    
    function generaPalabraconHuecos ($cadenaletras, $cadenapalabra) {
        
        // Genero una cadena resultado inicialmente con todas las posiciones con -
        $resu = $cadenapalabra;
        for ($i = 0; $i<strlen($resu); $i++){
            $resu[$i] = '-';
        }

        for ($i = 0; $i<strlen($cadenaletras); $i++){
            for ($j = 0; $j<strlen($resu); $j++){
                if(comprobarLetra($cadenaletras[$i], $cadenapalabra[$j])){
                  $resu[$j]  = $cadenaletras[$i];
                }
            }
        }
        return $resu;
    }
    
    if (! isset($_SESSION['palabrasecreta'])) {
        $_SESSION['palabrasecreta'] = elegirPalabra();
        $_SESSION['letrasusuario'] = ""; // Inicialmente no tiene ninguna letra
        $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
    }
    
    if (isset ($_REQUEST['letrasusuario'])){ 
        $encontrada = false;
        $palabra = "";
        
        for($i = 0; $i<strlen($_REQUEST['letrasusuario']); $i++){
            if(comprobarLetra($_REQUEST['letrasusuario'][$i], $_SESSION['palabrasecreta'])){
                $_SESSION['letrasusuario'] .= $_REQUEST['letrasusuario'][$i];
                $encontrada = true;
                $palabra = generaPalabraconHuecos($_REQUEST['letrasusuario'][$i], $_SESSION['palabrasecreta']);
                break;
            }
        }

        $_SESSION['fallos'] = ($encontrada)? $_SESSION['fallos'] : $_SESSION['fallos']++;

    }else{
        $palabra = generaPalabraconHuecos("", $_SESSION['palabrasecreta']);
    }

    echo "PALABRA : ".$palabra."<br><br>";
    
    if($palabra == $_SESSION['palabrasecreta']){
        echo "Enhorabuena. Has ganado.<br><br>";
        session_destroy();
        echo "<a href='control1.php'>Otra partida</a>";
        exit();
    }
    
    if($_SESSION['fallos'] > 0 && $_SESSION['fallos'] <= MAXFALLOS){
        echo "Fallos cometidos: ".$_SESSION['fallos'];
        
    }elseif ($_SESSION['fallos'] > MAXFALLOS){
        echo "Superado el maximo numero de fallos. Has perdido.<br><br>";
        session_destroy();
        echo "<a href='control1.php'>Otra partida</a>";
        exit();
    }
    

?>    
    <form method='get'>
    Introduce una letra <input type='text' name='letrasusuario'><br><br>
    </form>
  </body>
</html>