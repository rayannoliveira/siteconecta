<?php

require_once("Doador.php");


class DAODoador{

	
		private $conn;
		private $stmt;
		private $res;
		private $sql;

	public function __construct(){
			$usuario = "root";
		    $senha = "";
		    $this->conn = new PDO("mysql:host=localhost;dbname=bdconecta", "$usuario","$senha");
	}

	public function salvar($objdoador){
		      //Montar o comando SQL
			  $this->sql = "Insert into doador(nome_doador,email_doador, senha_doador,tipo_doador,texto_doador,	link_doador,categoria_doador) values (:nomeDoador,:emailDoador,:senhaDoador,:tipoPessoa,:textoDoador,:linkDoador,:tipoDoador)";
			  //Criar um objeto para Preparo do Comando SQL
			  $this->stmt = $this->conn->prepare($this->sql);
			  //Unir ao comando SQL os dados informados na Tela do Usuário
			  $nomeDoador=$objdoador->getNomeDoador();
			  $emailDoador=$objdoador->getEmailDoador();
			  $senhaDoador=$objdoador->getSenhaDoador();
			  $tipoPessoa=$objdoador->getTipoPessoa();
			  $textoDoador=$objdoador->getTextoDoador();
			  $linkDoador=$objdoador->getLinkDoador();
			  $tipoDoador=$objdoador->getTipoDoador();
			  $this->stmt->bindParam(':nomeDoador',$nomeDoador);
			  $this->stmt->bindParam(':emailDoador',$emailDoador);
			  $this->stmt->bindParam(':senhaDoador',$senhaDoador);
			  $this->stmt->bindParam(':tipoPessoa',$tipoPessoa);
			  $this->stmt->bindParam(':textoDoador',$textoDoador);
			  $this->stmt->bindParam(':linkDoador',$linkDoador);
			  $this->stmt->bindParam(':tipoDoador',$tipoDoador);

			  //Executar o comando SQL
			  $retorno = $this->stmt->execute();
			  return ($retorno);
		   }

		   public function buscarDoador(){
		   	$this->sql="select * from doador";
		   	$this->stmt = $this->conn->query($this->sql);
		   	$lista=$this->stmt->fetchALL();
		   	
		   	return $lista;
		   }	

		   public function buscarLogin($emailDoador,$senhaDoador){

		   		$this->sql="select * from doador where email_doador = '{$emailDoador}' and senha_doador='{$senhaDoador}' ";
			  	$this->stmt = $this->conn->query($this->sql);
		   		$lista=$this->stmt->fetch();
			  	return $lista;
		   	   }
		   	public function buscarUsuario($id){
		   		$this->sql="select * from doador where idDoador='{$id}'";
		   		$this->stmt=$this->conn->query($this->sql);
		   		$lista=$this->stmt->fetch();
		   		return $lista;
		   	}
		   	public function alterarDados($objdoador){
		   		$this->sql="update doador set senha, texto, linl where id=";
		   		$this->stmt=$this->conn->query($this->sql);
		   		$lista=$this->stmt->execute();
		   		return $lista;


		   	}
		   	public function listarDoador($id){
		   		$this->sql="select * from doador where idDoador='{$id}'";
		   		$this->stmt=$this->conn->query($this->sql);
		   		$linha=$this->stmt->fetch();
		  
		   		$doador= new Doador($linha['nome_doador'],$linha['email_doador'],$linha['senha_doador'],$linha['tipo_doador'],$linha['texto_doador'],$linha['link_doador'],$linha['categoria_doador']); 
		   		return $doador;

		   	}

		   	


	

}
?>