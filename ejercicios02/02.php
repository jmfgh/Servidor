<?php
require_once 'funcionesvar.php';

$uno = random_int(1,10);
$dos = random_int(1,10);

echo "<p>1º Numero:<strong> $uno</strong></p>";
echo "<p>2º Numero:<strong> $dos</strong></p><br>";

echo $uno." + ".$dos." = ".calSuma($uno, $dos)."<br>";
echo $uno." - ".$dos." = ".calResta($uno, $dos)."<br>";
echo $uno." * ".$dos." = ".calMulti($uno, $dos)."<br>";
echo $uno." / ".$dos." = ".calDivi($uno, $dos)."<br>";
echo $uno." % ".$dos." = ".calMod($uno, $dos)."<br>";
echo $uno." ** ".$dos." = ".calPot($uno, $dos)."<br>";

?>