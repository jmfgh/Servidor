<?php
require_once 'funcionesref.php';

$uno = random_int(1,10);
$dos = random_int(1,10);

echo "<p>1º Numero:<strong> $uno</strong></p>";
echo "<p>2º Numero:<strong> $dos</strong></p><br>";

$suma = 0;
$resta = 0;
$mul = 0;
$divi = 0;
$mod = 0;
$pot = 0;

calSuma($uno, $dos, $suma);
calResta($uno, $dos, $resta);
calMulti($uno, $dos, $mul);
calDivi($uno, $dos, $divi);
calMod($uno, $dos, $mod);
calPot($uno, $dos, $pot);


echo $uno." + ".$dos." = ".$suma."<br>";
echo $uno." - ".$dos." = ".$resta."<br>";
echo $uno." * ".$dos." = ".$mul."<br>";
echo $uno." / ".$dos." = ".$divi."<br>";
echo $uno." % ".$dos." = ".$mod."<br>";
echo $uno." ** ".$dos." = ".$pot."<br>";

?>