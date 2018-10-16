<?php
require_once("model/Conectapa.php");
require_once("model/DAOConectapa.php");
require_once("model/RecebedorMateriais.php");
require_once("model/DAORecebedorMateriais.php");
require_once("model/DAOMateriais.php");
require_once("model/DAORecebedor.php");
 


session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.html');

  }
 $id=$_SESSION['id'];
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
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="materialcadastrado.php">Material cadastrado</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Macth</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="conversa.php">Conversas</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="controler/sairController.php?=">Sair</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <h1 class="text-center" style="font-family: Bitter, serif;color: rgb(74,112,89);padding-top: 50px;">Match</h1>
    <div class="container d-flex flex-row justify-content-center align-content-center" style="width: 851px;">
        <div class="table-responsive flex-nowrap">
           <form>
            <table id="tabeladomatch" class="table">
                <thead>
                    <tr>
                        <th>Material</th>
                        <th>Ação</th>
                        <th>Seu Match</th>
                        <th>Email</th>
                        <th>Texto de descrição&nbsp;</th>
                        <th>Link de de Redes Sociais</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $obj= new DAOConectapa();
                    $retorno= $obj->listar($id);
                    //var_dump($retorno);
                    
                    foreach ($retorno as $objConectaPA) {
                        // Pegando id de recebedorMateriais
                            $idR=$objConectaPA->getIdRecebedorMateriais();
                        //Criando DAORecebedorMateriais
                        $objRecebedorM= new DAORecebedorMateriais();
                        $retornoRecebedorMaterial= $objRecebedorM->listaR($idR);
                        $idMaterial= $retornoRecebedorMaterial->getIdMateriaisRf();
                        echo $idMaterial;
                                //Criando DAOMateriais
                        $objmaterial= new DAOMateriais();
                        $retornoMaterial= $objmaterial->listarM($idMaterial);
                        $nomeMaterial= $retornoMaterial->getNomeMateriais();
                        echo $nomeMaterial;
                            //Criando Recebedor
                        $idRecebedor=$retornoRecebedorMaterial->getIdRecebedorRf();
                        $objRecebedor= new  DAORecebedor();
                        $retonoRecebedor= $objRecebedor->listarR( $idRecebedor);
                       // var_dump($retonoRecebedor);
                        //DoadaorMaterial = DAODoadorMaterial.listar(iddoadormaterial);
                ?>   
                    <tr>
                        <td style="background-color: #ffffff;"> <?php echo $retornoMaterial->getNomeMateriais(); ?></td>
                        <td style="background-color: #ffffff;"> <?php echo $retornoRecebedorMaterial->getTipoRm(); ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $retonoRecebedor->getNomeRecebedor(); ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $retonoRecebedor->getEmailRecebedor(); ?> <label></label></td>
                        <td style="background-color: #ffffff;"> <?php echo $retonoRecebedor->getTextoRecebedor(); ?> <label></label></td>
                        <td style="background-color: #ffffff;"><?php echo $retonoRecebedor->getLinkRecebedor();?></td>
                    </tr>
               <?php
                    }
                ?>
                </tbody>
                
            </table>
           
            <div class="container d-flex flex-row justify-content-center align-content-center">

                    <button id="apagar"class="btn btn-primary" value="apagar" type="button" style="background-color: rgb(255,34,34);width: 125px;border-color: #fbfcfc;">Apagar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/jquery.dataTables.min.js""></script>
    
    <script type="text/javascript">
        $(document).ready( function () {
        $('#tabeladomatch').DataTable();
        } ); 
    </script>
           
</body>

</html>