<?php
class Doador{
	//private $idDoador;
	private $nomeDoador;
	private $emailDoador;
	private $senhaDoador;
	private $tipoPessoa;
	private $textoDoador;
	private $linkDoador;
	private $tipoDoador;
	public function __construct($nomeDoador,$emailDoador,$senhaDoador,$tipoPessoa,$textoDoador,$linkDoador,$tipoDoador){

		//this->idDoador=$idDoador;
		$this->nomeDoador=$nomeDoador;
		$this->emailDoador=$emailDoador;
		$this->senhaDoador=$senhaDoador;
		$this->tipoPessoa=$tipoPessoa;
		$this->textoDoador=$textoDoador;
		$this->linkDoador=$linkDoador;
		$this->tipoDoador=$tipoDoador;

	}
	//public function setIdDoador($idDoador){
	//	      $this->idDoador = $idDoador;
	//	   }
	public function setNomeDoador($nomeDoador){
		      $this->nomeDoador = $nomeDoador;
		   }
	public function setEmailDoador($emailDoador){
			$this->emailDoador=$emailDoador;
	}
	public function setSenhaDoador($senhaDoador){
			$this->senhaDoador=$senhaDoador;
	}

	public function setTipoPessoa($tipoPessoa){
			$this->tipoPessoa=$tipoPessoa;
	}
	public function setTextoDoador($textoDoador){
			$this->textoDoador=$textoDoador;
	}
	
	
	public function setLinkDoador($linkDoador){
			$this->linkDoador=$linkDoador;
	}

	public function setTipoDoador($tipoDoador){
			$this->tipoDoador=$tipoDoador;
	}

	//public function getIdDoador(){
		 //   return ($this->idDoador);
		 //  }
	public function getNomeDoador(){
		      return ($this->nomeDoador);
		   }
	public function getEmailDoador(){
			return ($this->emailDoador);
	}

	public function getSenhaDoador(){
			return ($this->senhaDoador);
	}
	public function getTipoPessoa(){
			return ($this->tipoPessoa);
	}
	 public function getTextoDoador(){
	 	return ($this->textoDoador);
	 }
	
	public function getLinkDoador(){
			return ($this->linkDoador);
	}
	public function getTipoDoador(){
			return ($this->tipoDoador);
	}


}
?>