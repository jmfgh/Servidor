<html>
<head>
<meta charset="UTF-8">
<title>Casino</title>
</head>
<body>

<?php

session_start();

$visitas = 1;
// Si existe el COOKIE obtengo las visitas
if ( isset($_COOKIE['visitas'])){
    $visitas = $_COOKIE['visitas'];
}

if(!isset ($_SESSION['fondos'])){
    
    if(isset($_REQUEST['fondos'])){
        if(is_numeric($_REQUEST['fondos'])){
            $_SESSION['fondos'] = $_REQUEST['fondos'];
            header("refresh:0;url='".$_SERVER['PHP_SELF']."'"); 
            exit();
        }else{
            echo "No has introducido un número.";
            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Volver </a>";
            exit();
        } 
    }
    
    echo "Bienveni@ al Gran Casino de IES Tetuán.<br>";
    
    if ( $visitas > 0 ){
        echo "Esta es la ".$visitas."ª vez que nos visita.<br><br>";
    }
    
    $visitas++;
    setcookie("visitas",$visitas, time()+ 4 * 7 * 24 * 3600);
    
    echo "<form method='POST'>
            Introduzca fondos <input type='number' name='fondos' autofocus><br><br>
            <input type='submit' name='ingresar' value='Ingresar fondos'>
          <form>";
     
}else{ 

    if(isset($_REQUEST['terminar']) || $_SESSION['fondos'] < 1){
        echo "Hasta pronto. Te vas con ".$_SESSION['fondos']." €.<br><br>";
        session_destroy();
        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Volver </a>";
        exit();
    }
    
    include_once 'apuesta.php';

}
?>
</body>
</html>