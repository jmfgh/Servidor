<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MiniBank</title>
</head>
<body>
<?php

session_start();

$saldo = 0;
if(!isset ($_SESSION['saldo'])){
   $_SESSION['saldo'] = $saldo;
}
    
if (!empty($_GET['msg'])) echo "RESULTADO:". $_GET['msg']."<br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $importe = 0;
    
    if(isset($_POST['Orden'])){
        
        if($_POST['Orden'] == 'Terminar'){
            echo "Hasta la proxima. Muchas gracias.<br>";
            session_destroy();
            exit();
        }
        
        include_once 'minibancopro.php';
        
        switch ($_POST['Orden']) {
            case 'Ingreso':
                $saldo = ingresar($_SESSION['saldo'], $importe);
                $_SESSION['saldo'] = $saldo;
                $msg = " Operación realizada.";
                header("Location: minibanco.php?msg=".urlencode($msg));
                break;
            case 'Reintegro':
                $saldo = sacar($_SESSION['saldo'], $importe);
                $_SESSION['saldo'] = $saldo;
                $msg = " Operación realizada.";
                header("Location: minibanco.php?msg=".urlencode($msg));
                break;
            case  'Ver saldo':
                verSaldo($_SESSION['saldo']);
                header("Refresh:3");
                break;

        }
    }
}

?>
<form action="minibanco.php" method="POST">
    Importe de la operación: <input name="importe" type="text" focus><br>
    <input type="submit" name="Orden" value="Ingreso">
    <input type="submit" name="Orden" value="Reintegro">
    <input type="submit" name="Orden" value="Ver saldo">
    <input type="submit" name="Orden" value="Terminar">
</form>
</body>
</html>