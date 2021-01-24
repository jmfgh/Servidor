<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------

include_once 'config.php';
include_once 'modeloUser.php';
include_once "Usuario.php";


/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlUserInicio(){
    $msg = "";
    $user ="";
    $clave ="";
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['user']) && isset($_POST['clave'])){
            $user =$_POST['user'];
            $clave=$_POST['clave'];
            $db = modeloUser::getModelo();
            if ($db->modeloOkUser($user,$clave)){
                $_SESSION['user'] = $user;
                $_SESSION['tipouser'] = $db->modeloObtenerTipo($user);
                if ( $_SESSION['tipouser'] == "Máster"){
                    $_SESSION['modo'] = GESTIONUSUARIOS;
                    header('Location:index.php?orden=VerUsuarios');
                    return;
                }
                else {
                  // Usuario normal;
                  // PRIMERA VERSIÓN SOLO USUARIOS ADMISTRADORES
                    $msg="Error: Acceso solo permitido a usuarios Administradores.";
                  unset( $_SESSION['user']);
                }
            }
            else {
                $msg="Error: usuario y contraseña no válidos.";
           }  
        }
    }
    
    include_once 'plantilla/formAcceso.php';
}

/*
 *  Muestra y procesa el formulario de alta (ADMINISTRADOR)
 */
function ctlUserAlta (){
    $user="";
    $nombre="";
    $clave1="";
    $clave2="";
    $email="";
    $plan="";
    $estado="";
    
    // Si hay que procesar el formulario
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        //var_dump($_POST);
        
        if (empty($_POST['user'])  || empty($_POST['nombre']) ||
            empty($_POST['clave1'])|| empty($_POST['clave2']) || 
            empty($_POST['email']) || !isset($_POST['plan'])   ||  !isset($_POST['estado']) ){
        $msg = NOVACIO;    
        } else {
           
        $user =   $_POST['user'];
        $nombre = $_POST['nombre'];
        $clave1 = $_POST['clave1'];
        $clave2 = $_POST['clave2'];
        $email  = $_POST['email'];
        $plan   = $_POST['plan'];
        $estado = $_POST['estado'];
        
        $db = modeloUser::getModelo();
        $msg = $db->modeloErrorValoresAlta($user, $clave1, $clave2, $nombre, $email, $plan, $estado);
        if ( !$msg ){
            
            $usuario = new Usuario();
            $usuario->user = $user;
            $usuario->clave = $clave1;
            $usuario->nombre = $nombre;
            $usuario->email = $email;
            $usuario->plan = $plan;
            $usuario->estado = $estado;
            
            if ( modeloUserAdd($usuario) ){
            // OJO EL NOMBRE DE $user
            mkdir("./app/dat/".$user);
            $msg=" Nuevo Usuario almacenado.";  
            header('Location:index.php?orden=VerUsuarios&msg='.urlencode($msg));
            return;
            }
            else {
            $msg= "Error: No se puede añadir el usuario";
            }
       }   
     }
    }
    include_once 'plantilla/fnuevo.php';
}
/*
 *  Muestra y procesa el formulario de Modificación (ADMINISTRADOR)
 */
function ctlUserModificar (){
    
    if ( $_SERVER['REQUEST_METHOD'] == "GET"){
        $db = modeloUser::getModelo();
        
        $datosuser = $db->modeloUserGet($_GET['userid']);
        $user=$_GET['userid'];
        $clave1=$datosuser->clave;
        $clave2=$datosuser->clave;
        $nombre=$datosuser->nombre;
        $email =$datosuser->email;
        $plan =$datosuser->plan;
        $estado=$datosuser->estado;

    }
    // Si hay que procesar el formulario
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        
        if (empty($_POST['user'])  || empty($_POST['nombre']) ||
            empty($_POST['clave1'])|| empty($_POST['clave2']) ||
            empty($_POST['email']) || !isset($_POST['plan'])   ||  !isset($_POST['estado']) ){
                $msg = NOVACIO;
        } else {
            
            $user =   $_POST['user'];
            $nombre = $_POST['nombre'];
            $clave1 = $_POST['clave1'];
            $clave2 = $_POST['clave2'];
            $email  = $_POST['email'];
            $plan   = $_POST['plan'];
            $estado = $_POST['estado'];
            
            $db = modeloUser::getModelo();

            // ERROR al fallo correo electronico
            $msg = $db->modeloErrorValoresModificar($user, $clave1, $clave2, $nombre, $email, $plan, $estado);
            if ( !$msg ){
                
                $usuario = new Usuario();
                $usuario->user = $user;
                $usuario->clave = $clave1;
                $usuario->nombre = $nombre;
                $usuario->email = $email;
                $usuario->plan = $plan;
                $usuario->estado = $estado;
                
                if ( $db->modeloUserUpdate($usuario) ){
                $msg=" Se han modificado los datos del Usuario $user";
                header('Location:index.php?orden=VerUsuarios&msg='.urlencode($msg));
                return;
            }
            else {
                $msg= "Error al modificar el usuario $user ";
            }
          }
        }
    }
    include_once 'plantilla/fmodifica.php';
}



function ctlUserRegistroUsuario(){
    $user="";
    $nombre="";
    $clave1="";
    $clave2="";
    $email="";
    $plan="";
    $estado="I"; // Estado Inactivo
    
    // Si hay que procesar el formulario
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        //var_dump($_POST);
        
        if (empty($_POST['user'])  || empty($_POST['nombre']) ||
            empty($_POST['clave1'])|| empty($_POST['clave2']) ||
            empty($_POST['email']) || !isset($_POST['plan'])  ){
                $msg = NOVACIO;
        } else {
            
            $user =   $_POST['user'];
            $nombre = $_POST['nombre'];
            $clave1 = $_POST['clave1'];
            $clave2 = $_POST['clave2'];
            $email  = $_POST['email'];
            $plan   = $_POST['plan'];
            
            $db = modeloUser::getModelo();
  
            $msg = $db->modeloErrorValoresAlta($user, $clave1, $clave2, $nombre, $email, $plan, $estado);
            if ( !$msg ){
                
                $usuario = new Usuario();
                $usuario->user = $user;
                $usuario->clave = $clave1;
                $usuario->nombre = $nombre;
                $usuario->email = $email;
                $usuario->plan = $plan;
                $usuario->estado = $estado;
                
                if ($db->modeloUserAdd($usuario)){
                    $msg="Usuario registrado. Introduzca sus datos";
                    header('Location:index.php?orden=Inicio&msg='.urlencode($msg));
                    return;
                }
                else {
                    $msg= "Error: No se puede añadir el usuario";
                }
            }
        }
    }
    include_once 'plantilla/fregistro.php';
}




function ctlUserDetalles(){
    $db = modeloUser::getModelo();
    $datosuser = $db->modeloUserGet($_GET['userid']);
    $userid=$_GET['userid'];
    $nombre=$datosuser->nombre;
    $email =$datosuser->email;
    $plancod =$datosuser->plan;
    $estadocod=$datosuser->estado;
    $plan  =PLANES[$plancod];
    $estado=ESTADOS[$estadocod];
    
    include_once 'plantilla/detalle.php';
    
}
/*
 * Borrar usuarios
 */

function ctlUserBorrar(){
    $userid=$_GET['userid'];

    $db = modeloUser::getModelo();
    $user = $db->modeloUserDel($userid);
    
    if ($user){
        $msg=" Usuario eliminado.";   
    }
    else {
        $msg= "Error no se puede eliminar el usuario.";
    }
    header('Location:index.php?orden=VerUsuarios&msg='.urlencode($msg));
}

/*
 * Cierra la sesión 
 */
function ctlUserCerrar(){
    modeloUser::closeModelo();
    session_destroy();
    header('Location:index.php');
}

/*
 * Muestro la tabla con los usuario 
 */ 
function ctlUserVerUsuarios (){
    $db = modeloUser::getModelo();
    // Obtengo los datos del modelo
    $usuarios = $db->modeloUserGetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verusuarios.php';
   
}