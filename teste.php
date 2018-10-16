<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>principal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=268f853a55016b6e4f9fd07010b08eba">
</head>
<?php //require_once("model/Materiais.php");
require_once("model/DAOMateriais.php");
$objdao= new DAOMateriais;
$retorno= $objdao->buscarMateriais();

?>
<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="#" style="color:rgba(74,112,89,0.76);font-family:Alegreya, serif;"><img src="/assets/img/logo.png?h=dc531584aea61a2253419ba39859a747" style="width:55px;">Conecta+Verde</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Edital Perfil</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Conversas</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="container d-flex float-none justify-content-center align-items-center align-content-center mx-auto">
        <select style="width:354px;">
            <optgroup label="This is a group">
            <?php foreach ($retorno as $lista) { ?>
            <option value="<?php echo $lista['idmateriais'];?>"> <?php echo  utf8_encode($lista['nome_materiais']);}?> 
            </option> 
        </optgroup>
    </select>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>