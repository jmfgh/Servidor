<?php
session_start(); // Inicio de sesión

if (isset($_SESSION["nuevatarjeta"])) {
    $tarjeta = $_SESSION["nuevatarjeta"];
}
if(isset($_GET["nuevatarjeta"])){
    $_SESSION["nuevatarjeta"] = $_GET["nuevatarjeta"];
    header("refresh:0;url=pagosession.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Forma de pago</title>
    </head>
    <body>
    <?php
    
      if (!isset($tarjeta)) {
        echo "<H2>NO TIENE FORMA DE PAGO ASIGNADA</H2>";
      } else {
        echo "<H2> SU FORMA DE PAGO ACTUAL ES</H2> 
              <img src='../imagenes/".$tarjeta.".gif' />  ";
      }
    ?>
         <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br>
         <a href='pagosession.php?nuevatarjeta=cashu'><img  src='../imagenes/cashu.gif' /></a>&ensp;
         <a href='pagosession.php?nuevatarjeta=cirrus1'><img  src='../imagenes/cirrus1.gif' /></a>&ensp;
         <a href='pagosession.php?nuevatarjeta=dinersclub'><img  src='../imagenes/dinersclub.gif' /></a>&ensp;
         <a href='pagosession.php?nuevatarjeta=mastercard1'><img  src='../imagenes/mastercard1.gif'/></a>&ensp;
         <a href='pagosession.php?nuevatarjeta=paypal'><img  src='../imagenes/paypal.gif' /></a>&ensp;
         <a href='pagosession.php?nuevatarjeta=visa1'><img  src='../imagenes/visa1.gif' /></a>&ensp;
         <a href='pagosession.php?nuevatarjeta=visa_electron'><img  src='../imagenes/visa_electron.gif'/></a>  
    </body>
</html>
