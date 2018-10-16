<?php
class DoadorMateriais{
	private $idDoadorF;
	private $idMateriaisF;
	private $idDoadorMateriais;
	private $tipoDM;

public function __construct($idDoadorF,$idMateriaisF,$tipoDM){
	$this->idDoadorF=$idDoadorF;
	$this->idMateriaisF=$idMateriaisF;
	$this->tipoDM=$tipoDM;
}

public function setIdDoadorf($idDoadorF){
	$this->idDoadorF=$idDoadorF;
}
public function setIdMateriaisf($idMateriaisF){
	$this->idMateriaisF=$idMateriaisF;
}

public function setTipoDM($tipoDM){
	$this->tipoDM=$tipoDM;
}

public function getIdDoador(){
	return ($this->idDoadorF);
}
public function getIdMateriaisf(){
	return ($this->idMateriaisF);
}

public function getTipoDM(){
	return($this->tipoDM);
}

}

?>