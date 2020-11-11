<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Generador de calendarios</title>
<style>
* {
	box-sizing: border-box;
}
/* Create two equal columns that floats next to each other */
.column {
	float: left;
	padding: 10px;
	height: 200px;
}

/* Clear floats after the columns */
.fila:after {
	content: "";
	display: table;
	clear: both;
}
</style>
</head>
<body>
	<div class="fila">
		<div class="column">
			<form name="f2" method="post">
				<select name="mes">
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>

				</select> <label for="a�o">A�o: </label> <select name="a�o">
	   
	   <?php
    $a�oActual = date("Y");
    for ($a�o = 1980; $a�o <= $a�oActual; $a�o ++) {
        ?>
	            <option value=<?= $a�o?>><?= $a�o?></option>
	       <?php
    }
    ?>
	</select> <br> <input type="submit" value="Enviar" />
			</form>
		</div>
		<div class="column">
<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    exit();
}
$mes = (int) $_POST['mes'];
$a�o = (int) $_POST['a�o'];
$primerdia = date("w", mktime(0, 0, 0, $mes, 1, $a�o));
// Ojo Domingo es 0, Lunes es 1 y S�bado es 6
if ($primerdia == 0) {
    $primerdia = 7;
}
$numerodias = date("t", mktime(0, 0, 0, $mes, 1, $a�o));

$meses = array(
    1 => "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
);

echo " Primer d�a del mes es d�a = $primerdia <br>";
echo " El mes tiene $numerodias d�as ";

?>
<table border="1">
				<tr>
					<td colspan="7"> <?php echo $meses[$mes]?> del <?php echo $a�o?></td>
				</tr>
				<tr>
					<td>L</td>
					<td>M</td>
					<td>X</td>
					<td>J</td>
					<td>V</td>
					<td>S</td>
					<td>D</td>
				</tr>
				<tr>
<?php
$ndias = 0;
$totalcasillas = calcularCasillas($primerdia, $numerodias);

for ($ncasillas = 1; $ncasillas <= $totalcasillas; $ncasillas ++) {
    // Casilla con n�mero de d�a
    if ($primerdia <= $ncasillas && $ndias < $numerodias) {
        $ndias ++;
        // Festivo
        if ($ncasillas % 7 == 6 || $ncasillas % 7 == 0) {
            echo "<td style=color:red> $ndias </td>";
        } else {
            echo "<td> $ndias </td>";
        }
    } else {
        // Casilla en blanco
        echo "<td></td> ";
    }
    if ($ncasillas % 7 == 0 && $ncasillas < $totalcasillas){
        echo "</tr><tr>";
    }
}    
?>

</tr>
</table>
</div>
</div>
</body>
</html>
<?php 
/**
 * Calcula el n�mero de casilla a pintar tanto en blanco como con datos
 * Por ejemplo: febrero puede necesitar solo 4 semanas x7-> 28 casillas si el lunes es dia 1.
 * En un mes de 31 d�as si el 1 es domingo se necesitan 6 x7 --> 42
 * @param int $primerdia
 * @param int $numerodias
 * @return int n�mero de casillas necesarias ( Divibles entre 7)
 */
function calcularCasillas ( $primerdia, $numerodias){
    $total = $primerdia-1 + $numerodias;
    if ( $total == 28) return 28;
    if ( $total <= 35) return 35;
    else return 42;
}

?>