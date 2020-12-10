<?php
class CuentaBancaria
{
    // -------------------------------------
    // Atributos de Clase
    // -------------------------------------
    
    private $saldo;          // Saldo actual de la cuenta
    private $numMovimientos; // N�mero de movimientos realizados
    private static $numCuentas= 0; // N�mero de cuentas creadas
    
    // -------------------------------------
    //   METODOS:
    // -------------------------------------
    
    // Constructores
    public function __construct(int $saldo= 0){
        $this->saldo= $saldo;
        $this->numMovimientos= 0;
        //CuentaBancaria::$numCuentas++; // Otra forma menos general
        self::$numCuentas++;
    }
    
    //Ingreso, incrementa el saldo en una cantidad indicada como par�metro.
    public function ingreso (int $cantidad){
        $this->saldo+= $cantidad;
        $this->numMovimientos++;
    }
    
    // Abono, decremento el saldo en la cantidad indicada como par�metro.
    public function abono (int $cantidad){
        $this->saldo-= $cantidad;
        $this->numMovimientos++;
    }
    
    // Anotar gastos decrementa el saldo en 20 euros si
    // el saldo de la cuenta es menor 1000
    public function anotarGastos(){
        if($this->saldo < 1000){
            $this->saldo-= 20;
        }
        $this->numMovimientos++;
    }
    
    // Anotar Intereses incrementa la cuenta seg�n valor de inter�s indicado
    // como par�metro en tanto por ciento.
    public function anotarIntereses ( int $interes){
        $this->saldo += ($this->saldo*$interes)/100;
        $this->numMovimientos++;
    }
    
    //Realizar transferencia a cuenta, decrementa el saldo
    // en la cantidad indicada
    // como par�metro, realizando un ingreso en la cuenta destino.
    public function transferencia ( int $importe, CuentaBancaria$destino){
        $this->saldo-= $importe;
        $this->numMovimientos++;
        $destino->ingreso($importe);
        $destino->numMovimientos++;
    }
    
    // Consultar estado de la cuenta, mostr� el saldo actual y
    // el n�mero de operaciones realizadas
    public function consultarEstado ():string{
        return "Saldo = ". $this->saldo.
        " Numero de operaciones = ". $this->numMovimientos;
    }
}
?>