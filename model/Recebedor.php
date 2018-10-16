<?php
class Recebedor{
	private $idRecebedor;
	private $nomeRecebedor;
	private $emailRecebedor;
	private $senhaRecebedor;
	private $tipoPessoa;
	private $textoRecebedor;
	private $linkRecebedor;
	private $tipoRecebedor;
public function __construct($nomeRecebedor,$emailRecebedor,$senhaRecebedor,$tipoPessoa,$textoRecebedor,$linkRecebedor,$tipoRecebedor){

		$this->nomeRecebedor=$nomeRecebedor;
		$this->emailRecebedor=$emailRecebedor;
		$this->senhaRecebedor=$senhaRecebedor;
		$this->tipoPessoa=$tipoPessoa;
		$this->textoRecebedor=$textoRecebedor;
		$this->linkRecebedor=$linkRecebedor;
		$this->tipoRecebedor=$tipoRecebedor;
}
public function setNomeRecebedor($nomeRecebedor){
		      $this->nomeRecebedor = $nomeRecebedor;
		   }
	public function setEmailRecebedor($emailRecebedor){
			$this->emailRecebedor=$emailRecebedor;
	}
	public function setSenhaDoador($senhaRecebedor){
			$this->senhaRecebedor=$senhaRecebedor;
	}

	public function setTipoPessoa($tipoPessoa){
			$this->tipoPessoa=$tipoPessoa;
	}
	public function setTextoRecebedor($textoRecebedor){
			$this->textoRecebedor=$textoRecebedor;
	}
	
	
	public function setLinkRecebedor($linkRecebedor){
			$this->linkRecebedor=$linkRecebedor;
	}

	public function setTipoRecebedor($tipoRecebedor){
			$this->tipoRecebedor=$tipoRecebedor;
	}

	//public function getIdDoador(){
		 //   return ($this->idDoador);
		 //  }
	public function getNomeRecebedor(){
		      return ($this->nomeRecebedor);
		   }
	public function getEmailRecebedor(){
			return ($this->emailRecebedor);
	}

	public function getSenhaRecebedor(){
			return ($this->senhaRecebedor);
	}
	public function getTipoPessoa(){
			return ($this->tipoPessoa);
	}
	 public function getTextoRecebedor(){
	 	return ($this->textoRecebedor);
	 }
	
	public function getLinkRecebedor(){
			return ($this->linkRecebedor);
	}
	public function getTipoRecebedor(){
			return ($this->tipoRecebedor);
	}





}

?>