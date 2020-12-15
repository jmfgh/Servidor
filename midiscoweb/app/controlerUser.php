<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------
include_once 'config.php';
include_once 'modeloUser.php';
include_once 'funciones.php';

//Registrar nuevo usuario
function ctlUserRegistroUsuario() {
    $user  = "";
    $nombre  = "";
    $clave   = "";
    $mail = "";
    $nplan= "";
    include_once 'plantilla/fnuevo.php';
}

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
            if ( modeloOkUser($user,$clave)){
                $_SESSION['user'] = $user;
                $_SESSION['tipouser'] = modeloObtenerTipo($user);
                if ( $_SESSION['tipouser'] == "M�ster"){
                    $_SESSION['modo'] = GESTIONUSUARIOS;
                    header('Location:index.php?orden=VerUsuarios');
                }
                else {
                  // Usuario normal;
                  // PRIMERA VERSIÓN SOLO USUARIOS ADMISTRADORES
                  $msg="Error: Acceso solo permitido a usuarios Administradores.";
                  unset($_SESSION['user']);
                  // $_SESSION['modo'] = GESTIONFICHEROS;
                  // Cambio de modo y redireccion a verficheros
                }
            }
            else {
                $msg="Error: usuario y contrase�a no v�lidos.";
           }  
        }
    }
    
    include_once 'plantilla/facceso.php';
}

function ctlUserAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyecci�n de c�digo
    comprobarContra($clave);
    modeloUserAdd($userid,$userdat);
}

function ctlUserDetalles(){
    $user  = "";
    $nombre  = "";
    $clave   = "";
    $mail = "";
    $nplan= "";
    include_once 'plantilla/fmod.php';
}

function ctlUserModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyecci�n de c�digo
    $userid = $_POST['user'];
    $userdat = $_POST;
    modeloUserUpdate ($userid,$userdat);
}

function ctlUserBorrar(){
    modeloUserDel($user);
}

// Cierra la sesión y vuelva los datos
function ctlUserCerrar(){
    session_destroy();
    modeloUserSave();
    header('Location:index.php');
}

// Muestro la tabla con los usuario 
function ctlUserVerUsuarios (){
    // Obtengo los datos del modelo
    $usuarios = modeloUserGetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verusuariosp.php';
   
}