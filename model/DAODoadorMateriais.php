<?php

class DAODoadorMateriais{

		private $conn;
		private $stmt;
		private $res;
		private $sql;


	public function __construct(){
			$usuario = "root";
		    $senha = "";
		    $this->conn = new PDO("mysql:host=localhost; dbname=bdconecta", "$usuario","$senha");
	}

	public function salvar ($objdoadorM){
		$this->sql="insert into doador_materiais(idDoadorF, idmateriaisF,tipo) values(:idDoadorF,:idMateriaisF,:tipoDM)";
		$this->stmt = $this->conn->prepare($this->sql);

		$idDoadorF= $objdoadorM->getIdDoador();
		$idMateriaisF= $objdoadorM->getIdMateriaisf();
		$tipoDM= $objdoadorM->getTipoDM();

		$this->stmt->bindParam(':idDoadorF',$idDoadorF);
		$this->stmt->bindParam(':idMateriaisF',$idMateriaisF);
		$this->stmt->bindParam(':tipoDM',$tipoDM);
		$retorno = $this->stmt->execute();
		return ($retorno);


	}

	public function buscarMaterias($id){
		$idDoador=$id;
		$this->sql="select * from doador_materiais where idDoadorF='{$idDoador}'";
		   	$this->stmt = $this->conn->query($this->sql);
		   	$lista=$this->stmt->fetchALL();
		   	
		   	return $lista;


	}

	public function buscarMatch($idMateriais,$tipoAcao){
		$id= $idMateriais;
		$tipo=$tipoAcao;

		$this->sql= "select id_doador_materias, id_recebedor_materiais FROM recebedor_materiais r, doador_materiais d 
					WHERE idmateriaisRF = '{$id}' AND
					r.tipo = '{$tipo}' AND 
					idmateriaisRF = idmateriaisF 
					AND r.tipo = d.tipo";
		$this->stmt = $this->conn->query($this->sql);
		$lista= $this->stmt->fetchALL();
		return $lista;

	}
	
	public function listar($iddoadormateriais){
		$id=$iddoadormateriais;
		$this->sql="select idRecebedorRF, idmateriaisRF, tipo FROM recebedor_materiais where id_recebedor_materiais ='{$id}'";
		$this->stmt=$this->conn->query($this->sql);
		$lista=$this->stmt->fetchALL();


		foreach ($lista as $linha) {
		   		$conectapa = new Doador($linha['idDoador_MateriaisF'],$linha['idRecebedor_MateriaisF']); 

				//$conectapa -> nome = $linha['idcanectaPa']; 
				//$conectapa -> idDoadorMateriais = $linha['idDoador_MateriaisF']; 
				//$conectapa -> idRecebedorMateriais = $linha['idRecebedor_MateriaisF'];
			 
			 	$listaconectaPA -> append($conectapa); 
	
			}
		   	return $listaconectaPA;

	}




}

	
?>