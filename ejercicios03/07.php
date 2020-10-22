<html>
<head>
<meta charset="UTF-8">
<title>Pais al azar</title>
</head>
<body>

<?php
include_once 'infopaises.php';

$paiselegidos = array_rand($paises,2);

foreach ($paiselegidos as $pais){
    echo "País : ".$pais." , con ".number_format($paises[$pais]['Poblacion'], 0, ',', '.'). " habitantes <br/>";
    echo "Lista de Ciudades: ";
    foreach($ciudades[$pais] as $ciudad){
        echo $ciudad." ";
    }
    echo "<br/>Enlace a google maps: ";
?>
	<a href="https://www.google.es/maps/place/<?php echo $pais?>">Maps</a><br>
<?php
}
?>	 

</body>
</html>