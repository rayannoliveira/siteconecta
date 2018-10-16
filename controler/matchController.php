<?php

require_once("../model/DAOConectapa.php");
require_once("../model/DaoRecebedorMateriais.php");
require_once("../model/Conectapa.php");

session_start();
class MatchController{

	public function __construct(){
		$tipo=$_SESSION['tipo'];
			if ($tipo=='doador') {
				$this->includeDoador();
				//header('location:conectapa.php');
			}
			else{

			}
	}
	public function includeDoador(){
				$idmaterias= $_SESSION['tipoMaterial'];
				$tipoacao=$_SESSION['tipoacao'];
				$idDoador=$_SESSION['id'];
				$tipoacao;
				$objdao= new DaoRecebedorMateriais;
				$retorno= $objdao->buscarM($idmaterias,$tipoacao);

				if ($retorno==true) {
					
					var_dump($retorno);
				}
				else{

					echo "não match";
				}
				
 
	}

}
new MatchController();
?>