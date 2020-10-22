<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    table, td, th{
        border: 1px solid black; 
        border-collapse:collapse;
        padding: 5px;
    }
    
  </style>
</head>

<body>

<?php

    $rango = [];
    
    for ($i = 1; $i <= 49; $i++) {
        $rango[] = $i;
    }
    
    $indices = array_rand($rango, 6);
    
    // Me quedo con los valores
    $vbonoloto = [];
    foreach ($indices as $i ) {
        $vbonoloto[] = $rango[$i];
    }
    // Obtengo el número complementario y lo elimino de la tabla
    $icomplementario = random_int(0, 5);
    $complementario = $vbonoloto[$icomplementario];
    unset($vbonoloto[$icomplementario]);
    
    ?>
<body>
    <b>Sorteo de la Bonoloto</b>
	<table border=1>
		<tr>
    <?php
    foreach ($vbonoloto as $num) {
        ?>
    <td><?php echo $num ?></td>
    <?php
    }
    ?>
    <td><?php echo "Complementario $complementario " ?></td>
		</tr>
	</table>

</body>
</html>