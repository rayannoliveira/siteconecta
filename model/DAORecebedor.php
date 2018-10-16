<?php
require_once("Recebedor.php");
class DAORecebedor{
	
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
			  $this->sql = "Insert into recebedor(nome_receb, email_receb, senha_receb, tipo_receb, texto_receb, link_receb,categoria_recebedor) values (:nomeRecebedor,:emailRecebedor,:senhaRecebedor,:tipoPessoa,:textoRecebedor,:linkRecebedor,:tipoRecebedor)";
			  //Criar um objeto para Preparo do Comando SQL
			  $this->stmt = $this->conn->prepare($this->sql);
			  //Unir ao comando SQL os dados informados na Tela do Usuário
			  $nomeRecebedor=$objdoador->getNomeRecebedor();
			  $emailRecebedor=$objdoador->getEmailRecebedor();
			  $senhaRecebedor=$objdoador->getSenhaRecebedor();
			  $tipoPessoa=$objdoador->getTipoPessoa();
			  $textoRecebedor=$objdoador->getTextoRecebedor();
			  $linkRecebedor=$objdoador->getLinkRecebedor();
			  $tipoRecebedor=$objdoador->getTipoRecebedor();
			  $this->stmt->bindParam(':nomeRecebedor',$nomeRecebedor);
			  $this->stmt->bindParam(':emailRecebedor',$emailRecebedor);
			  $this->stmt->bindParam(':senhaRecebedor',$senhaRecebedor);
			  $this->stmt->bindParam(':tipoPessoa',$tipoPessoa);
			  $this->stmt->bindParam(':textoRecebedor',$textoRecebedor);
			  $this->stmt->bindParam(':linkRecebedor',$linkRecebedor);
			  $this->stmt->bindParam(':tipoRecebedor',$tipoRecebedor);

			  //Executar o comando SQL
			  $retorno = $this->stmt->execute();
			  return ($retorno);
		   }	


			public function buscarLogin($emailRecebedor,$senhaRecebedor){
				$this->sql="select * from recebedor  where email_receb='{$emailRecebedor}' and senha_receb= '{$senhaRecebedor}'";
				$this->stmt = $this->conn->query($this->sql);
		   		$lista=$this->stmt->fetch();
			  	return $lista;

			}

			public function listarR($idrecebedor){
				$this->sql="select * from recebedor where idRecebedor ='{$idrecebedor}' ";
		   		$this->stmt = $this->conn->query($this->sql);
		   		$linha=$this->stmt->fetch();
	   	  
		   		$recebedor = new  Recebedor($linha['nome_receb'],$linha['email_receb'],$linha['senha_receb'],$linha['tipo_receb'],$linha['texto_receb'],$linha['link_receb'],$linha['categoria_recebedor']); 

	  		return $recebedor;

			}


}
?>