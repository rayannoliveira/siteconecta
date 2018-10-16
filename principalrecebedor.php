<?php
require_once("model/Doador.php");
require_once("model/Recebedor.php");

 session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.html');

  }
 
$logado = $_SESSION['login'];
$tipo=$_SESSION['tipo'];
$id=$_SESSION['id'];
echo $id;

 
?>

<!DOCTYPE html>
<html>
<?php //require_once("model/Materiais.php");
require_once("model/DAOMateriais.php");
$objdao= new DAOMateriais;
$retorno= $objdao->buscarMateriais();

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>principal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=268f853a55016b6e4f9fd07010b08eba">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="#" style="color:rgba(74,112,89,0.76);font-family:Alegreya, serif;">Conecta+Verde</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="editarperfil.php">Edital Perfil</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="conversa.php">Conversas</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="controler/sairController.php?=">Sair</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
            
    <div class="container" style="padding-left:291px;">
        <div class="card" style="width:565px;height:389px;">
            <div class="card-body" style="width:526px;height:324px;">
                <form action="controler/buscaController.php" method="post">
                <h4 class="card-title">Achar parceiro</h4>
                <p class="card-text">Tipo de ação</p>
                <select name="tipoacao" style="width:529px;height:43px;">
                    
                        <option value="doar"> Receber Doação</option>
                        <option value="vender">Comprar</option>
                        <option value="reciclar">Reciclar</option>
                </select>
                <p
                    class="card-text" style="height:25px;padding-right:6px;padding-top:13px;">Matérias</p>
                    <select name="tipoMaterial" style="width:529px;height:43px;">
                            <?php foreach ($retorno as $lista) { ?>
                            <option value="<?php echo $lista['idmateriais'];?>"> <?php echo  utf8_encode($lista['nome_materiais']);}?> 
                             </option> 
                        </optgroup>
                    </select>
                    <label> </label>
                        <button
                            class="btn btn-primary" type="submit" style="margin:1px;width:536px;padding-right:17px;padding-top:18px;padding-bottom:13px;padding-left:23px;background-color:rgba(74,112,89,0.76);">Procurar
                        </button>
                        </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>