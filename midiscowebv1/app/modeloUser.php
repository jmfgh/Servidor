<?php 
include_once "Usuario.php";
include_once 'config.php';
include_once 'util.php';
/* DATOS DE USUARIO
• Identificador ( 5 a 10 caracteres, no debe existir previamente, solo letras y números)
• Contraseña ( 8 a 15 caracteres, debe ser segura)
• Nombre ( Nombre y apellidos del usuario
• Correo electrónico ( Valor válido de dirección correo, no debe existir previamente)
• Tipo de Plan (0-Básico |1-Profesional |2- Premium| 3- Máster)
• Estado: (A-Activo | B-Bloqueado |I-Inactivo )
*/
// Inicializo el modelo 
// Cargo los datos del fichero a la session


/*
 * Acceso a datos con BD Usuarios y Patrón Singleton
 * Un único objeto para la clase
 */
class modeloUser {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt_usuarios = null;
    private $stmt_usuario  = null;
    private $stmt_boruser  = null;
    private $stmt_moduser  = null;
    private $stmt_creauser = null;
    private $stmt_usuok  = null;
    private $stmt_email = null;
    private $stmt_emailok = null;
    private $stmt_tipo = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new modeloUser();
        }
        return self::$modelo;
    }
    
    // Constructor privado  Patron singleton
    
    private function __construct(){
        
        try {
            $dsn = "mysql:host=".SERVER_DB.";dbname=Usuarios;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        // Construyo las consultas
        $this->stmt_usuarios  = $this->dbh->prepare("select * from Usuarios");
        $this->stmt_usuario   = $this->dbh->prepare("select * from Usuarios where user=:user");
        $this->stmt_boruser   = $this->dbh->prepare("delete from Usuarios where user=:user");
        $this->stmt_moduser   = $this->dbh->prepare("update Usuarios set clave=:clave, nombre=:nombre, email=:email, plan=:plan, estado=:estado where user=:user");
        $this->stmt_creauser  = $this->dbh->prepare("insert into Usuarios (user,clave,nombre,email,plan,estado) Values(?,?,?,?,?,?)");
        $this->stmt_usuok   = $this->dbh->prepare("select * from Usuarios where user=:user and clave=:clave");
        $this->stmt_email   = $this->dbh->prepare("select * from Usuarios where user=:user");
        $this->stmt_emailok   = $this->dbh->prepare("select * from Usuarios where email=:email");
        $this->stmt_tipo   = $this->dbh->prepare("select * from Usuarios where user=:user");
    }
    
    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $this->stmt_usuarios = null;
            $this->stmt_usuario  = null;
            $this->stmt_boruser  = null;
            $this->stmt_moduser  = null;
            $this->stmt_creauser = null;
            $this->stmt_usuok = null;
            $this->stmt_email = null;
            $this->stmt_emailok = null;
            $this->stmt_tipo = null;
            $this->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }
   
    
    // Devuelvo la lista de Usuarios
    public function modeloUserGetAll ():array {

        $tusuarios = [];
        $this->stmt_usuarios->setFetchMode(PDO::FETCH_NUM);
        
        if ( $this->stmt_usuarios->execute() ){
            while ( $user = $this->stmt_usuarios->fetch()){
                $tusuarios[]= $user;
            }
        }

        return $tusuarios;
    }
    
    // Devuelvo un usuario o false
    public function modeloUserGet (String $user) {
        $usuario = false;
        
        $this->stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $this->stmt_usuario->bindParam(':user', $user);
        if ( $this->stmt_usuario->execute() ){
            if ( $obj = $this->stmt_usuario->fetch()){
                $usuario= $obj;
            }
        }
        return $usuario;
    }
    
    // UPDATE
    public function modeloUserUpdate($usuario):bool{
        
        $this->stmt_moduser->bindValue(':user',$usuario->user);
        $this->stmt_moduser->bindValue(':clave',$usuario->clave);
        $this->stmt_moduser->bindValue(':nombre',$usuario->nombre);
        $this->stmt_moduser->bindValue(':email',$usuario->email);
        $this->stmt_moduser->bindValue(':plan',$usuario->plan);
        $this->stmt_moduser->bindValue(':estado',$usuario->estado);
        $this->stmt_moduser->execute();
        $resu = ($this->stmt_moduser->rowCount () == 1);
        return $resu;
    }
    
    //INSERT
    public function modeloUserAdd($usuario):bool{
        
        $this->stmt_creauser->execute( [$usuario->user, $usuario->clave, $usuario->nombre, $usuario->email, $usuario->plan, $usuario->estado]);
        $resu = ($this->stmt_creauser->rowCount () == 1);
        return $resu;
    }
    
    //DELETE
    public function modeloUserDel(String $user):bool {
        $this->stmt_boruser->bindParam(':user', $user);
        $this->stmt_boruser->execute();
        $resu = ($this->stmt_boruser->rowCount () == 1);
        return $resu;
    }
    
    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
    
    // Comprueba usuario y contraseña son correctos (boolean)
    function modeloOkUser($user,$clave){
        
        $this->stmt_usuok->bindValue(':user',$user);
        $this->stmt_usuok->bindValue(':clave',$clave);
        $this->stmt_usuok->execute();
        
        $resu = ($this->stmt_usuok->rowCount () == 1);
        
        return $resu;
    }
    
    function modeloGetEmail(String $user){
        $this->stmt_usuario->setFetchMode(PDO::FETCH_ASSOC);
        $this->stmt_email->bindValue(':user',$user);
        if ( $this->stmt_email->execute() ){
            while ( $resu = $this->stmt_email->fetch()){
                
                $email = $resu["email"];
                
            }
        }
        
        return $email;
    }
    
    /*
     * Comprueba si un correo existe
     */
    function modeloExisteEmail( String $email):bool{
        $this->stmt_emailok->bindValue(':email',$email);
        $this->stmt_emailok->execute();
        
        $resu = ($this->stmt_emailok->rowCount () == 1);
        return $resu;
    }
    
    // Devuelve el plan de usuario (String)
    function modeloObtenerTipo(String $user){
        $resu = "";
        
        $this->stmt_usuario->setFetchMode(PDO::FETCH_ASSOC);
        $this->stmt_tipo->bindValue(':user',$user);
        if ( $this->stmt_tipo->execute() ){
            while ( $resu = $this->stmt_tipo->fetch()){
                
                $plan = $resu["plan"];
               
            }
        }
        
        return PLANES[$plan];
    }
    
    /*
     * Chequea si hay error en el datos antes de guardarlos
     */
    public function modeloErrorValoresAlta ($user,$clave1, $clave2, $nombre, $email, $plan, $estado){
        if ( $this->modeloUserGet($user))                         return USREXIST;
        if ( preg_match("/^[a-zA-Z0-9]+$/", $user) == 0)    return USRERROR;
        if ( $clave1 != $clave2 )                           return PASSDIST;
        if ( !$this->modeloEsClaveSegura($clave1) )                return PASSEASY;
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL))    return MAILERROR;
        if ( $this->modeloExisteEmail($email))                     return MAILREPE;
        return false;
    }
    
    public function modeloErrorValoresModificar($user, $clave1, $clave2, $nombre, $email, $plan, $estado){
        
        if ( $clave1 != $clave2 )                           return PASSDIST;
        if ( !$this->modeloEsClaveSegura($clave1) )                return PASSEASY;
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL))    return MAILERROR;
        // SI se cambia el email
        $emailantiguo = $this->modeloGetEmail($user);
        if ( $email != $emailantiguo && $this->modeloExisteEmail($email))   return MAILREPE;
        return false;
    }
    
    /*
     * Comprueba que la contraseña es segura
     */
    
    public function modeloEsClaveSegura (String $clave):bool {
        if ( empty($clave))         return false;
        if (  strlen($clave) < 8 )  return false;
        if ( !hayMayusculas($clave) || !hayMinusculas($clave)) return false;
        if ( !hayDigito($clave))         return false;
        if ( !hayNoAlfanumerico($clave)) return false;
        
        return true;
    }
    
}



    










































