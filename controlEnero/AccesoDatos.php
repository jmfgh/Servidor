<?php
include_once "Cliente.php";
include_once "Pedido.php";
/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;
    
    // Construyo las consultas
    private static $select1 = "select * from CLIENTES where NOMBRE = ? and CLAVE = ?";
    private static $select2 = "select * from PEDIDOS where COD_CLIENTE = ?";
    private static $modveces = "update CLIENTES set VECES = ( ? + 1) where COD_CLIENTE = ?";
    
    
    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    // Creo un lista de alimentos, podría obtenerse de una base de datos
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        
    }
    
    // Devuelvo Cliente o false
    public function obtenerCliente (String $nombre, String $clave) {
        $cliente = false;
        
        
        $stmt = $this->dbh->prepare(self::$select1);
        $stmt->bindValue(1,$nombre);
        $stmt->bindValue(2,$clave);
        // Devuelvo una tabla asociativa
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        // Devuelve objectos clientes llamando a constructor y a métodos setter
        if ( $stmt->execute() ){
           if ( $obj = $stmt->fetch()){
                $cliente= $obj;
            }
        }
        return $cliente;
    }
    
    // Devuelvo la lista de pedidos
    public function obtenerListaPedidos (String $cliente):array {
        $tpedidos = [];
        $stmt = $this->dbh->prepare(self::$select2);
        $stmt->bindValue(1,$cliente);
        // Devuelvo una tabla asociativa
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        // Devuelve objectos clientes llamando a constructor y a métodos setter
        if ( $stmt->execute() ){
            while ( $pedido = $stmt->fetch()){
                $tpedidos[]= $pedido;
            }
        }
        return $tpedidos;
    }
    
    // UPDATE
    public function updateVeces($cliente):bool{

        $stmt = $this->dbh->prepare(self::$modveces);
        $stmt->bindValue(1,$cliente->veces);
        $stmt->bindValue(2,$cliente->cod_cliente);
        
        $stmt->execute();
        $resu = ($stmt->rowCount () == 1);
        return $resu;
    }
    
    // Evito que se pueda clonar el objeto.
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
}