<?php 
define('MAX', 300);

if($_REQUEST['comentario'] == ""){
    echo "No has introducido ningun comentario.";
}elseif (str_word_count($_REQUEST['comentario']) > MAX){
    echo "El comentario no puede exceder las ".MAX." palabras.";
}else{
    
    echo "<div>
            <b> Detalles:</b><br>
            <table>
            <tr><td>Longitud:          </td><td>".strlen($_REQUEST['comentario'])."</td></tr>
            <tr><td>Nº de palabras:    </td><td>".str_word_count($_REQUEST['comentario'])."</td></tr>
            <tr><td>Letra + repetida:  </td><td>".letraMasRepetida($_REQUEST['comentario'])."</td></tr>
            <tr><td>Palabra + repetida:</td><td>".palabraMasRepetida($_REQUEST['comentario'])."</td></tr>
            </table>
            </div>";

}
?>