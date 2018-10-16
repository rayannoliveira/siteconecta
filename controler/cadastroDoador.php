<?php
require_once("model/DAODoadorMateriais.php");
 session_start();
 
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.html');

  }
$logado = $_SESSION['login'];
$tipo=$_SESSION['tipo'];
$id=$_SESSION['idDoador'];






?>