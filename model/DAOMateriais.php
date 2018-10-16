<?php
require_once("Materiais.php");
class DAOMateriais {

		private $conn;
		private $stmt;
		private $res;
		private $sql;

	public function __construct(){
			$usuario = "root";
		    $senha = "";
		    $this->conn = new PDO("mysql:host=localhost;dbname=bdconecta", "$usuario","$senha");
	}

		public function buscarMateriais(){
		   	$this->sql="select * from materiais";
		   	$this->stmt = $this->conn->query($this->sql);
		   	$lista=$this->stmt->fetchALL();
		   	
		   	return $lista;
	}	

	public function listarM ($idmateriais){

		$this->sql="select * from materiais where idmateriais='{$idmateriais}' ";
		   	$this->stmt = $this->conn->query($this->sql);
		   	$linha=$this->stmt->fetch();

		   	$material = new  Materiais($linha['nome_materiais']); 

	  	return $material;
		   	
		  

	}


}

?>