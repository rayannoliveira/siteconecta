<?php
	 require_once("../model/Doador.php");
	 require_once("../model/DAODoador.php");
	 require_once("../model/Recebedor.php");
	 require_once("../model/DAORecebedor.php");
	class CadastroController{

		public function __construct(){
		     $tipo= $_POST['tipoContribuidor'];
			 if ($tipo == "contribuidor"){
			 	$this->incluirDoador();
			 	header("Location: ../principal.php");
			 }
			 else{
			 	$this->incluirRecebedor();
			 	header("Location: ../principal.php");
			 }
		   }

		private function incluirDoador(){
			$senha= md5($_POST['senha']);
			$doador= new Doador($_POST["nome"],$_POST["email"],$senha,$_POST["TipoPessoa"],$_POST["texto"],$_POST["link"],$_POST["tipoContribuidor"]);
            $objdao= new DAODoador;
            $retorno=$objdao->salvar($doador);

        }
       public function incluirRecebedor(){
       	$senha= md5($_POST['senha']);
       	$recebedor= new Recebedor($_POST["nome"],$_POST["email"],$senha,$_POST["TipoPessoa"],$_POST["texto"],$_POST["link"],$_POST["tipoContribuidor"]);
        	$objdao=new DAORecebedor;
        	$retorno= $objdao->salvar($recebedor);
        }
 }
	new CadastroController();
?>
