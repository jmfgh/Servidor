<html>
<head>
<meta charset="UTF-8">
<title>Casino</title>
</head>
<body>
<?php
        if(isset($_REQUEST['apuesta']) && isset($_REQUEST['cantidad'])){
            
            if($_REQUEST['cantidad'] > $_SESSION['fondos']){
                echo "No tienes tanto dinero para apostar.<br>";
                echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Volver </a>";
                exit();
            }
            
            $_SESSION['fondos'] = $_SESSION['fondos'] - $_REQUEST['cantidad'];
            
            $num = random_int(1,2);
            $resu = "";
            
            if($num == 2){
                $resu = "par";
            }else{
                $resu = "impar";
            }
            
            if($_REQUEST['apuesta'] == $resu){
                $_SESSION['fondos'] = $_SESSION['fondos'] + ($_REQUEST['cantidad'] * 2);
                echo "Enhorabuena! Has acertado!<br>";
            
            }else{
                echo "Vaya...Has perdido.<br>";
            }
        
            echo "Tu saldo actual es de ".$_SESSION['fondos']." €.<br>";
            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Nueva apuesta </a>";
            exit();
        }
?>
<form method='POST'>
    Apueste una cantidad: <input type='number' name='cantidad' autofocus><br><br>
    Haga una apuesta: <br>
        <input type='radio' name='apuesta' value='par'> Par <br>
        <input type='radio' name='apuesta' value='impar'> Impar <br><br>
    <input type='submit' value='Enviar'>
    <input type='submit' name='terminar' value='Terminar partida'><br><br>
</form>
</body>
</html>