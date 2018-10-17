<?php

require_once("model/Conectapa.php");

class DAOConectapa{
		private $conn;
		private $stmt;
		private $res;
		private $sql;

	public function __construct(){
			$usuario = "root";
		    $senha = "";
		    $this->conn = new PDO("mysql:host=localhost;dbname=bdconecta", "$usuario","$senha");
	}

		public function buscarM($IdMateriaisD,$TipoAcao){

			$this->sql="select * from recebedor_materiais where idmateriasRF='{$IdMateriaisD}' and tipo='{$TipoAcao}'";
			$this->stmt=$this->conn->query($this->sql);
		   	$lista=$this->stmt->execute();
		   	return $lista;
		   	

		}

		public function salva($objconecta){
		$this->sql="insert into canectapa (idDoador_MateriaisF, idRecebedor_MateriaisF) values(:idDoadorMateriais,:idRecebedorMateriais)";
		  $this->stmt = $this->conn->prepare($this->sql);
		
		  $idDoadorMateriais= $objconecta->getIdDoadorMateriais();
		  $idRecebedorMateriais=$objconecta->getIdRecebedorMateriais();
		 
		  $this->stmt->bindParam(':idDoadorMateriais', $idDoadorMateriais);
		  $this->stmt->bindParam(':idRecebedorMateriais', $idRecebedorMateriais);

		  $retorno = $this->stmt->execute();
			return ($retorno);
		}

		public function listar($iddoador){
			$listaconectaPA = new ArrayObject(); 

			//Criar um objeto ConectaPA
			//Consultar na base de dados usando um sql que liga conectpa, doador_materiais e doador
			$this->sql="Select idcanectaPa,idDoador_MateriaisF,idRecebedor_MateriaisF from canectapa, doador_materiais,doador
			where
			idDoador_MateriaisF = id_doador_materias	AND
			idDoadorF = idDoador				AND
			idDoador = '{$iddoador}'";
			$this->stmt=$this->conn->query($this->sql);
		   	$lista=$this->stmt->fetchALL();
		   	foreach ($lista as $linha) {
		   		$conectapa = new Conectapa($linha['idDoador_MateriaisF'],$linha['idRecebedor_MateriaisF']); 

				//$conectapa -> nome = $linha['idcanectaPa']; 
				//$conectapa -> idDoadorMateriais = $linha['idDoador_MateriaisF']; 
				//$conectapa -> idRecebedorMateriais = $linha['idRecebedor_MateriaisF'];
			 
			 	$listaconectaPA -> append($conectapa); 
	
			}
		   	return $listaconectaPA;
			
			//Fazer um laço e criar uma lista de ConectaPA
			//Retorna uma lista de ConectaPA
		}

		public function listarRecebedor($idrecebedor){
			$listaconectaPA = new ArrayObject(); 
			
			$this->sql= "Select idcanectaPa,idDoador_MateriaisF,idRecebedor_MateriaisF from canectapa, recebedor_materiais,recebedor
			where
			idRecebedor_MateriaisF = id_recebedor_materiais	AND
			idRecebedorRF = idRecebedor				AND
			idRecebedor ='{$idrecebedor}'";
			$this->stmt=$this->conn->query($this->sql);
			$lista=$this->stmt->fetchALL();

			foreach ($lista as $linha) {
		   		$conectapa = new Conectapa($linha['idDoador_MateriaisF'], $linha['idRecebedor_MateriaisF']); 

				//$conectapa -> nome = $linha['idcanectaPa']; 
				//$conectapa -> idDoadorMateriais = $linha['idDoador_MateriaisF']; 
				//$conectapa -> idRecebedorMateriais = $linha['idRecebedor_MateriaisF'];
			 
			 	$listaconectaPA -> append($conectapa); 
	
			}
		   	return $listaconectaPA;
		   	
	}

}

?>