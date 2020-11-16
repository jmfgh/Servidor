<html>
<head>
<meta charset="UTF-8">
<title>Casino</title>
</head>
<body>

<?php

session_start();

$visitas = 0;
// Si existe el COOKIE obtengo las visitas
if ( isset($_COOKIE['visitas'])){
    $visitas = $_COOKIE['visitas'];
}

// INICIO NO HAY CANTIDAD DE DINERO (NUEVA PARTIDA)
if (! isset($_REQUEST['fondos'])) {
    echo "Bienveni@ al Gran Casino de IES Tetuán.<br>";
    
    if ( $visitas > 0 ){
        echo "Esta es la ".$visitas."ª vez que nos visita.<br>";
    }
    
    $visitas++;
    setcookie("visitas",$visitas, time()+ 4 * 7 * 24 * 3600);
    
    echo "<form>Introduzca fondos <input type='number' name='fondos' autofocus></form>";
    
}else{
    if (! isset($_SESSION['fondos'])) {
        
        if(is_numeric($_REQUEST['fondos'])){
            $_SESSION['fondos'] = $_REQUEST['fondos'];
        }else{
            echo "No has introducido un número.";
            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Volver </a>";
            exit();
        }
    }
            
    if(isset($_REQUEST['terminar'])){
        echo "Hasta pronto. Te vas con ".$_SESSION['fondos']." €.<br><br>";
        session_destroy();
        exit();
    }else{
        echo"<form>
                Apueste una cantidad: <input type='number' name='cantidad' autofocus><br><br>
                Haga una apuesta: <br>	
                    <input type='radio' name='apuesta' value='par'> Par <br>
		            <input type='radio' name='apuesta' value='impar'> Impar <br><br>	
                <button name='terminar'>Terminar partida</button><br><br>
            </form>";
    }
            
    if(isset($_REQUEST['cantidad']) && isset($_REQUEST['apuesta'])){
        
        if(isset($_REQUEST['cantidad']) > $_SESSION['fondos']){
            echo "No tienes tanto dinero para apostar.";
            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Volver </a>";
            exit();
        }
        
        $num = random_int(1,2);
        $resu = "";
        
        if($num == 2){
            $resu = "par";
        }else{
            $resu = "impar";
        }
        
        if(isset($_REQUEST['apuesta']) == $resu){
            $_SESSION['fondos'] = $_SESSION['fondos'] + ($_REQUEST['apuesta'] * 2);
            echo "Enhorabuena! Has acertado!";
    
        }else{
            $_SESSION['fondos'] = $_SESSION['fondos'] - $_REQUEST['apuesta'];
            echo "Vaya...Has perdido.";
        }
        
        echo "Tu saldo actual es de ".$_SESSION['fondos']." €.";
        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Volver </a>";
    }
    
}


?>

 

</body>
</html>

