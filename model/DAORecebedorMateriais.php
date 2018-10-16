<?php
require_once("Doadormateriais.php");
require_once("Recebedor.php");
class DAORecebedorMateriais{
		private $conn;
		private $stmt;
		private $res;
		private $sql;

public function __construct(){
			$usuario = "root";
		    $senha = "";
		    $this->conn = new PDO("mysql:host=localhost;dbname=bdconecta", "$usuario","$senha");
	}

	public function salvarR($objrecebeM){
		$this->sql="insert into recebedor_materiais(idmateriaisRF,idRecebedorRF,tipo) values (:idmateriaisRF,:idRecebedorRF,:tipoRM)";
		$this->stmt = $this->conn->prepare($this->sql);

		$idmateriaisRF=$objrecebeM->getIdMateriaisRf();
		$idRecebedorRF= $objrecebeM->getIdRecebedorRf();
		$tipoRM=$objrecebeM->getTipoRm();

		echo $idmateriaisRF;
		echo $idRecebedorRF;
		echo $tipoRM;

		$this->stmt->bindParam(':idmateriaisRF',$idmateriaisRF);
		$this->stmt->bindParam(':idRecebedorRF',$idRecebedorRF);
		$this->stmt->bindParam(':tipoRM',$tipoRM);
		$retorno = $this->stmt->execute();
		//echo $retorno;
		return ($retorno);

	}
	public function buscarM($idmateriaisRF,$tipo){
			$id=$idmateriaisRF;
			$tipoRM= $tipo;
			$this->sql="select * from recebedor_materiais where idmateriaisRF = '{$id}' and  tipo='{$tipoRM}'";
			$this->stmt=$this->conn->query($this->sql);
		   	$lista=$this->stmt->fetchALL();
			return $lista;

		}

public function listaR($idrecebedormatch){

		
		$this->sql="select * FROM recebedor_materiais where id_recebedor_materiais ='{$idrecebedormatch}'";
		$this->stmt=$this->conn->query($this->sql);
		$linha=$this->stmt->fetch();
		$recebedor = new RecebedorMateriais($linha['idmateriaisRF'], $linha['idRecebedorRF'],$linha['tipo']); 
	  	return $recebedor;

	}




}

?>