<html>
<head>
<meta charset="UTF-8">
<title>Contador de visitas</title>
</head>
<body>
<?php

define ('FICHERO','accesos.txt');
$visitasNav = 0;
$visitasTotal = 0;

if ( isset($_COOKIE['visitasNav'])){
    $visitasNav = $_COOKIE['visitasNav'];
}

$visitasNav++;
setcookie("visitasNav",$visitasNav, time()+ 90 * 24 * 60 * 60);

if (!is_readable(FICHERO) ){
    $fichero = @fopen(FICHERO,"w") or die ("Error al crear el fichero.");
    fclose($fichero);
}

$fichero = @fopen(FICHERO, 'r') or die("ERROR al abrir fichero de visitas"); 
while ($linea = fgets($fichero)) {
    $visitasTotal = $linea;
}
fclose($fichero);
$visitasTotal++;

$fichero = @fopen(FICHERO,"w") or die ("Error al abrir el fichero.");
fwrite($fichero, $visitasTotal);
fclose($fichero);

echo "Esta es la $visitasNav ª vez que nos visitas desde este navegador.<br>";
echo "Esta es la $visitasTotal ª vez que nos visitan en total.";
?>
</body>
</html>