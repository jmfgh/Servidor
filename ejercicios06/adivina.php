<?php
session_start(); // Inicio de sesión

$intentos = 5;
if(isset($_SESSION['intentos'])) {
    $intentos = $_SESSION['intentos'];
}

if(!isset($_SESSION['num'])){
   $num = random_int(1,20);
   $_SESSION['num'] = $num;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){  
        
        if(isset($_POST['nueva'])){
            session_destroy();
            header("refresh:0;url=adivina.php");
            exit();
        }
        
        if(!empty($_POST["numero"])){
            $numero = $_POST["numero"];
        }else{
           echo "No has introducido ningun numero."; 
           header("refresh:1;url=adivina.php");
           exit();
        }
        

        
        if($numero == $_SESSION['num']){
            echo "Felicidades! Has acertado, era el ".$_SESSION['num'];
            session_destroy();           
        }elseif ($numero < $_SESSION['num']){
            echo "No! El numero que estoy pensando es mas alto.";
            header("refresh:1;url=adivina.php");
        }else{
            echo "No! El numero que estoy pensando es mas bajo.";
            header("refresh:1;url=adivina.php");
        }
        
        $intentos--;
        $_SESSION['intentos'] = $intentos;
         
    }else{
        
        if($intentos > 0){
            echo "Adivina en que numero del 1 al 20 estoy pensando. Tienes ".$intentos." intentos:<br><br>
            <form method='POST'>
                <input type='number' name='numero'><br><br>
                <input type='submit' value='Enviar'>
                <input type='submit' name='nueva' value='Nueva partida'>
            </form>";
        }else{
            echo "Has agotado el numero de intentos.";
            session_destroy(); 
        }
    }
    ?>
  </body>
</html>