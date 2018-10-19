<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.html');
  }
 require_once("../model/DAODoadorMateriais.php");
 require_once("../model/DAORecebedorMateriais.php");
 require_once("../model/Conectapa.php");    
 
 //require_once("../model/DAOConectapa.php");
 
 
 
  $tipoAtor=$_SESSION['tipo'];
  $id=$_GET['id'];
  $tipoAcao=$_GET['acao'];
  $tipoBotao=$_GET['tipo'];
  //echo $id,$idAtor,$tipoAtor;
 if ($tipoAtor=='doador' and $tipoBotao='match') {
    
     $objdaoador= new DAODoadorMateriais();
     $resultador=$objdaoador->buscarMatch( $id, $tipoAcao);
     
     foreach ($resultador as $lista) {
      $identificador=$lista['id_doador_materias'];
      $identificadorRecebedor=$lista['id_recebedor_materiais'];
     }
     if ($resultador == true) {
      require_once("../model/DAOConectapa.php");
      $obj= new Conectapa($identificador,$identificadorRecebedor);
      $objdao= new DAOConectapa();
      $resultador=$objdao->salva($obj);
       header("Location: ../macth.php");
  
        
     }
     else{
      echo "não macth";
     }
  }

  else{
    if ($tipoAtor=='recebedor' and $tipoBotao='match') {
           $objRecebedor= new DAORecebedorMateriais();
           $resultadoRecebedor= $objRecebedor->buscarMatch($id,$tipoAcao);
            var_dump($resultadoRecebedor);
              foreach ($resultadoRecebedor as $lista) {
                  $identificador=$lista['id_doador_materias'];
                  $identificadorRecebedor=$lista['id_recebedor_materiais'];
              }
              echo $identificador,$identificadorRecebedor;

                    if ($resultadoRecebedor == true) {
                        include("../model/DAOConectapa.php");

                        $objrecebedor= new Conectapa($identificador,$identificadorRecebedor);
                        $objdao= new DAOConectapa();
                        $resultador=$objdao->salva($objrecebedor);
                        header("Location: ../macth.php");
                    }
                    else{
                         echo "não macth";
                    }
        
     }else{

      echo "iremos implementar o botão apagar";
     }
   }
     

?>