<?php
class RecebedorMateriais{
	private $idRecebedorRF;
	private $idMateriaisRF;
	private $idRecebedorMateriais;
	private $tipoRM;


public function __construct($idMateriaisRF,$idRecebedorRF,$tipoRM){
	$this->idMateriaisRF=$idMateriaisRF;
	$this->idRecebedorRF=$idRecebedorRF;
	$this->tipoRM=$tipoRM;

}

public function setIdRecebedorRf($idRecebedorRF){
	$this->idRecebedorRF=$idRecebedorRF;
}

public function setIdMateriaisRf($idMateriaisRF){
	$this->idMateriaisRF=$idMateriaisRF;
}

public function setTipoRm(){
	$this->tipoRM=$tipoRM;
}

public function getIdRecebedorRf(){
	return($this->idRecebedorRF);
}

public function getIdMateriaisRf(){
	return($this->idMateriaisRF);
}

public function getTipoRm(){
	return($this->tipoRM);
}

}
?>