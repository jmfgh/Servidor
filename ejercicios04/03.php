<html>
<head>
</head>
<body>

<?php //----- Si método GET -> muestra formulario y si es POST -> Valida y procesa el formulario

    $resu = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 
        echo "<form method='POST'>
        		<input name='num1' type='number'>
        		<input name='num2' type='number'>
        		
        		<button name='suma' value='sum'>+</button>
        		<button name='resta' value='res'>-</button>
        		<button name='multiplicacion' value='mul'>*</button>	
        		<button name='division' value='div'>/</button>	

                <hr>
        		
        		<input type='radio' name='formato' value='dec'checked> Decimal <br>
        		<input type='radio' name='formato' value='bin'> Binario <br>		
        		<input type='radio' name='formato' value='hex'> Hexadecimal <br>

	          </form>";
    }else{     
        
        if(isset($_POST['num1']) && isset($_POST['num2']) && is_numeric($_POST['num1']) && is_numeric($_POST['num2'])){
            
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];          
            
            $formato = $_POST["formato"]; 
            $error = false;
            
            if(isset($_POST["suma"])){
                $resu = $num1 + $num2;
            }elseif (isset($_POST["resta"])){               
                $resu = $num1 - $num2;
            }elseif (isset($_POST["multiplicacion"])){
                $resu = $num1 * $num2;
            }elseif (isset($_POST["division"])){
                
                if($num2 != 0){
                $resu = $num1 / $num2;
                }else{
                    echo "Operacion no valida.";
                    $error = true;
                }
            }
            
            if(!$error){           
                switch ($formato){
                    case "dec":
                        echo $resu;
                        break;
                    case "bin":
                        echo decbin($resu);
                        break;
                    case "hex":
                        echo dechex($resu);
                        break;
                }
            }
            
            echo "<br><br><input type='button' value='volver' onClick='history.go(-1);'>";
            
        }else{
            echo "<p>No has introducido los numeros correctamente.</p>";
            echo "<input type='button' value='volver' onClick='history.go(-1);'>";
        }
        
        
    }
    

?>
</body>
</html>
