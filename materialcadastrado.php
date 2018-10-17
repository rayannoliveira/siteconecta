
<?php
 session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.html');

  }
  $id=$_SESSION['id'];
  $tipo=$_SESSION['tipo'];

 require_once("model/DAODoadorMateriais.php");
 require_once("model/DAORecebedorMateriais.php");
 
//Buscar os materiais cadastrados na tabela Doador_Materiais
if ($tipo=="doador") {
    $objdao= new DAODoadorMateriais;
    $retorno= $objdao->buscarMaterias($id);
}
else{
    $objdaor = new DAORecebedorMateriais;
    $retornoR= $objdaor->buscarMaterias($id);   
}

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
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"/>
 
   

    

</head>

<body style="background-image:url(&quot;assets/img/vfvf4.png&quot;);">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="principal.php" style="color:rgba(74,112,89,0.76);font-family:Alegreya, serif;"><img src="assets/img/logo%202.png" style="width:55px;">Conecta+Verde</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="editarperfil.php">Edital Perfil</a></li>  
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Material cadastrado</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="match.php">Macth</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="conversa.php">Conversas</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="controler/sairController.php?=">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <h1 class="text-center" style="font-family:Bitter, serif;color:rgb(74,112,89);">Materiais Cadastrados</h1>
    <div class="container">
        <?php
        if ($tipo=="doador") {
            include("tabelaMaterialD.php");
        }
        else{
            include("tabelaMaterialR.php");
         }   
        ?>
        
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Slider_Carousel_webalgustocom.js"></script>
    <script src="assets/js/jquery.dataTables.min.js""></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#materiasCadastrados').DataTable();
 
            $('#materiasCadastrados tbody').on( 'click', 'tr', function () {
                 if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                 }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
 
            $('#darmatch').click( function () {
                //variavél que busca o que foi selecionado no td da tabela pelo seu id
                 var id_coluna = $('#materiasCadastrados tr.selected').children('#id').text();
                var acao_coluna = $('#materiasCadastrados tr.selected').children('#acao').text();
                //location direciona para a pagina mandando o coteudo das variaveis pela url
                 var tipo="match";
                $(location).attr('href', 'controler/materiaisController.php?id=' + id_coluna.trim() + '&acao=' + acao_coluna.trim()+'&tipo='+ tipo.trim()); 


            } );

            $('#apagar').click( function () {
                //variavél que busca o que foi selecionado no td da tabela pelo seu id
                 var id_coluna = $('#materiasCadastrados tr.selected').children('#id').text();
                var acao_coluna = $('#materiasCadastrados tr.selected').children('#acao').text();
                //location direciona para a pagina mandando o coteudo das variaveis pela url
                var tipo="apagar";
                $(location).attr('href', 'controler/materiaisController.php?id=' + id_coluna.trim() + '&acao=' + acao_coluna.trim() +'&tipo='+ tipo.trim()) ;

            } );



        });
    </script>
    


</body>

</html>