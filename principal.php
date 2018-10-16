<?php
require_once("model/Doadormateriais.php");
require_once("model/DAODoadorMateriais.php");


 session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.html');

  }
 
?>
<?php //require_once("model/Materiais.php");
require_once("model/DAOMateriais.php");
$objdao= new DAOMateriais;
$retorno= $objdao->buscarMateriais();
 
//echo $retorno['nome_materiais'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>des</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aref+Ruqaa">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-image:url(&quot;assets/img/vfvf4.png&quot;);">
    <ul class="nav nav-tabs"></ul>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container">
            <a class="navbar-brand" href="#" style="color:rgba(74,112,89,0.76);font-family:Alegreya, serif;">
                <img src="assets/img/logo%202.png" style="width:55px;">Conecta+Verde</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="editarperfil.php">Edital Perfil</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="conversa.php">Conversas</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="materialcadastrado.php">Material cadastrado</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="match.php">Macth</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="controler/sairController.php?=">Sair</a></li>
                </ul>
        </div>
        </div>
        <form method="post" action="controler/buscaController.php">
    </nav>
    <label class="d-flex justify-content-center align-content-center align-self-center mx-auto" style="font-size:25px;padding-top:80px;">Tipo de ação</label>
    <div class="container d-flex float-none justify-content-center align-items-center align-content-center mx-auto">
        <select name="tipoacao" style="width:433px;padding-top:5px;height:47px;">
                         <option value="doar">Doar</option>
                        <option value="vender">Vender</option>
                        <option value="reciclar">Reciclar</option>
        </select>
    </div>
    <label
        class="d-flex justify-content-center align-content-center align-self-center mx-auto" style="font-size:25px;">Tipo de matérial</label>
        <div class="container d-flex float-none justify-content-center align-items-center align-content-center mx-auto">
            <select name="tipoMaterial" style="width:433px;padding-top:4px;height:47px;">
                <?php foreach ($retorno as $lista) { ?>
                            <option value="<?php echo $lista['idmateriais'];?>"> <?php echo  utf8_encode($lista['nome_materiais']);}?> 
                             </option> 
            
        </select>
    </div>
        <label
            class="d-flex justify-content-center align-content-center align-self-center mx-auto" style="font-size:25px;height:25px;"></label>
            <div class="container d-flex justify-content-center">
                <button  id="enviar"class="btn btn-primary" type="submit" style="width:433px;background-color:rgb(74,112,89);height:47px;">Salvar</button></div>
    </form>

    
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/bs-animation.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
            <script src="assets/js/Slider_Carousel_webalgustocom.js"></script>
</body>

</html>