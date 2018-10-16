<?php

class Materiais{
	private $nomeMateriais;


	public function __construct($nomeMateriais){

		$this->nomeMateriais=$nomeMateriais;
	}

	public function setNomeMateriais($nomeMateriais){
			$this->nomeMateriais=$nomeMateriais;
	}
	public function getNomeMateriais(){
			return ($this->nomeMateriais);
	}
}

?>