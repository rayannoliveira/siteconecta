<?php
session_start();
require_once("../model/DAODoador.php");
require_once("../model/Doador.php");
require_once("../model/DAORecebedor.php");

 class LoginController{

 	public function __construct(){

 		$tipo=$_POST["tipoContribuidor"];
 		if ($tipo=="doador") {
 			$emailDoador=$_POST['email'];
 			$senhaDoador= md5($_POST['senha']);
 			$objdao= new DAODoador;
 			$retorno =$objdao->buscarLogin($emailDoador,$senhaDoador);
 			$id=$retorno['idDoador'];


			if ($retorno==true) {
				$_SESSION['login'] = $emailDoador;
				$_SESSION['senha'] = $senhaDoador;
				$_SESSION['tipo']=$tipo;
				$_SESSION['id']=$id;
				header("Location: ../principal.php");
			}
			else{
				unset ($_SESSION['login']);
  				unset ($_SESSION['senha']);
  				header('location:../index.html');
			}
	}
  			else {
 			$emailRecebedor=$_POST['email'];
 			$senhaRecebedor= md5($_POST['senha']);
 			$objdaoR= new DAORecebedor;
 			$retorno= $objdaoR->buscarLogin($emailRecebedor,$senhaRecebedor);

 			$id=$retorno['idRecebedor'];
 			if ($retorno==true) {
				$_SESSION['login'] = $emailRecebedor;
				$_SESSION['senha'] = $senhaRecebedor;
				$_SESSION['tipo']=$tipo;
				$_SESSION['id']=$id;
				
				header("Location: ../principalrecebedor.php");
			}
				
			else{
				unset ($_SESSION['login']);
  				unset ($_SESSION['senha']);
  				header('location:../index.html');
			}

 		}
 		
 }

}

new LoginController();
?>