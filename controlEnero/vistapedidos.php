<?php
include_once 'Cliente.php';
include_once "Pedido.php";

echo '<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<div id="container" style="width: 380px;">
<div id="header">
<h1>CONTROL DE ACCESO A E-COMERCIO</h1>
</div>
<div id="content">';

       
       echo '<h2>Bienvenido usuario: '.$cliente->nombre.'  Has entrado '.$cliente->veces.' veces en nuestra web</h2>
            <p>Esta es su lista de pedidos del cliente con código '.$cliente->cod_cliente.'</p>';
       
       if (isset($mensaje)){
           
           echo $mensaje;
           
       }else{
           
           $total = 0;
           
           echo '<table border=1>';
           foreach ($pedidos as $pedido ) {
               $total+= $pedido->precio;
               
               echo '<tr>
            	<td>'.$pedido->producto.'</td>
                <td>'.$pedido->precio.'</td>
            	</tr>';
           }
           echo '<tr>
            	<td>TOTAL PEDIDOS</td><td>'.$total.'</td>
                </table>';
       }
       

echo '</div>
</div>
</body>
</html>';