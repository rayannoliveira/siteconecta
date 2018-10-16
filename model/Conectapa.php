<?php
class Conectapa{
	//adicionar atributo
	private $idDoadorMateriais;
	private $idRecebedorMateriais;

	public function __construct($idDoadorMateriais,$idRecebedorMateriais){

		$this->idDoadorMateriais=$idDoadorMateriais;
		$this->idRecebedorMateriais=$idRecebedorMateriais;
	}

	
	public function setIdDoadorMateriais($idDoadorMateriais){
		$this->idDoadorMateriais=$idDoadorMateriais;
	}
	public function setIdRecebedorMateriais($idRecebedorMateriais){
		$this->idRecebedorMateriais=$idRecebedorMateriais;
	}

	
	public function getIdDoadorMateriais(){
		return($this->idDoadorMateriais);
	}
	public function getIdRecebedorMateriais(){
		return($this->idRecebedorMateriais);
	}

}

?>