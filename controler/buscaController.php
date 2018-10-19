<?php
session_start();
require_once("../model/Doadormateriais.php");
require_once("../model/Recebedormateriais.php");
require_once("../model/DAODoadorMateriais.php");
require_once("../model/DAORecebedorMateriais.php");




class BuscarController{

	public function __construct(){

		//$tipoAcao=$_POST['tipoacao'];
		//$materias=$_POST['tipoMaterial'];
		$tipo=$_SESSION['tipo'];
		if ($tipo=="doador") {
			$this->incluirDoador();

		}
		else{
			$this->incluirRecebedor();
		}

	}

	public function incluirDoador(){
		$id=$_SESSION['id'];
		$obj= new Doadormateriais($id,$_POST['tipoMaterial'],$_POST['tipoacao']);
		$objdao= new DAODoadorMateriais();
		$retorno=$objdao->salvar($obj);
		$_SESSION['tipoMaterial']=$_POST['tipoMaterial'];
		$_SESSION['tipoacao']=$_POST['tipoacao'];
		
		header('location:../materialcadastrado.php');
	}
	public function incluirRecebedor(){

		$id=$_SESSION['id'];

		$obj= new Recebedormateriais($_POST['tipoMaterial'],$id, $_POST['tipoacao']);
		$objdao= new DAORecebedorMateriais();
		$retorno=$objdao->salvarR($obj);
		var_dump($retorno);
		$_SESSION['tipoMaterial']=$_POST['tipoMaterial'];
		$_SESSION['tipoacao']=$_POST['tipoacao'];

		header('location:../materialcadastrado.php');
		
	}

}
	
new BuscarController();
?>