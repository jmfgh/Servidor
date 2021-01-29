<?php

class Categoria{
	private $id;
	private $nombre;
	private $vendido;
	private $valorTotal;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getVendido() {
		return $this->vendido;
	}

	function getValorTotal() {
		return $this->valorTotal;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setVendido($vendido) {
		$this->vendido = $vendido;
	}

	function setValorTotal($valorTotal) {
		$this->valorTotal = $valorTotal;
	}

	public function getAll(){
		$categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
		return $categorias;
	}
	
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function edit(){
		$sql = "UPDATE categorias SET nombre='{$this->getNombre()}'";
		$sql .= " WHERE id={$this->id};";
		
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function delete(){

		$sql = "DELETE FROM categorias WHERE id={$this->id} AND id NOT IN (SELECT categorias.id FROM productos, categorias WHERE categorias.id = categoria_id AND categorias.id = {$this->id})";

		$delete = $this->db->query($sql);

		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

	public function vendido(){
		$resu = $this->db->query("SELECT sum(lineas_pedidos.unidades*productos.precio) as vendido from pedidos, lineas_pedidos, productos WHERE pedidos.id=lineas_pedidos.pedido_id AND productos.id=lineas_pedidos.producto_id AND productos.categoria_id = {$this->id}");
		
		while ($v = $resu->fetch_assoc()) {
			$vendido = $v['vendido'];
		}
		
		return $vendido;
	}

	public function valorTotal(){
		$resu = $this->db->query("SELECT sum(precio*stock) as total from productos WHERE productos.categoria_id = {$this->id};");
		
		while ($t = $resu->fetch_assoc()) {
			$total = $t['total'];
		}
		
		return $total;
	}

}