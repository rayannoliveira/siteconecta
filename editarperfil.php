<?php
require_once("model/DAODoador.php");

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
?>

<!DOCTYPE html>
<html>
<?php
if ($tipo=="doador") {
$objdao= new DAODoador;
$retono= $objdao->buscarUsuario($id);


}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>des</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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

<body style="background-image: url(&quot;assets/img/vfvf4.png&quot;);">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container">
            <a class="navbar-brand" href="principal.php" style="color:rgba(74,112,89,0.76);font-family:Alegreya, serif;">
                <img src="assets/img/logo%202.png" style="width:55px;">Conecta+Verde</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Edital Perfil</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="materialcadastrado.php">Material cadastrado</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="macth.php">Macth</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="conversa.php">Conversas</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="controler/sairController.php">sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="container" style="padding-bottom: 61px;">
        <h2 class="d-flex flex-row justify-content-center" style="color: rgb(74,112,89);">Editar Perfil</h2>
    </div>
    <div class="container" style="width: 355px;padding-top: -58px;padding-bottom: 5px;">
        <form method="post" data-aos="fade-up">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="<?php echo($retono['nome_doador']);?>" readonly="true"></div>
                <input class="form-control" type="email" name="email" placeholder="<?php echo($retono['email_doador']);?>" readonly="true"  style="padding: 10px;padding-top: 10px;">
                <label></label>
            <div class="form-group">
                <input class="form-control" type="password" name="senha" placeholder="Senha" style="padding-top: 7px;">
                <label></label>
                <input class="form-control" type="password" name="senha" placeholder=" Confirmação de Senha" style="padding-left: 13px;"> 
                <label></label>
                    <select value="1" class="form-control" name="Criador Verde">
                         <optgroup label="Tipo"><option value="fisica"> <?php echo($retono['tipo_doador']);?>
                        </option>
                    </optgroup>
                    </select>
                    
                    <label></label>
                    <textarea class="form-control" placeholder="<?php echo($retono['texto_doador']);?> "></textarea>
                    <label></label>
                    <input class="form-control" type="url" placeholder="<?php echo($retono['link_doador']);?>">
                    <label></label>
                    <select class="form-control" name="Criador Verde">
                         <option value="doador"><?php echo($retono['categoria_doador']);?></option>
                    </select>
                </div>
        </form>
    </div>
    <div class="container d-flex justify-content-center align-content-center">
        <button class="btn btn-primary d-flex justify-content-center" type="button" style="width: 433px;background-color: rgb(74,112,89);height: 47px;">Button</button></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Slider_Carousel_webalgustocom.js"></script>
</body>

</html>