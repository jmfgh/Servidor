<?php
define ('GESTIONUSUARIOS','1');
define('SERVER_DB','localhost');

//  Estado: (A-Activo | B-Bloqueado |I-Inactivo )
const  ESTADOS = ['A' => 'Activo','B' =>'Bloqueado', 'I' => 'Inactivo']; 

// (0-Básico |1-Profesional |2- Premium| 3- Máster)
const  PLANES = ['Básico','Profesional','Premium','Máster'];

const USREXIST = "El ID del usuario ya existe";
const USRERROR = "El ID de usuario solo puede tener letras y números";
const PASSDIST = "Los valores de la contraseñas no son iguales";
const PASSEASY = "La contraseña no es segura";
const MAILERROR = "El correo electrónico no es correcto";
const MAILREPE  = "La dirección de correo ya está repetida";
const NOVACIO   = "Rellenar todos los campos";

