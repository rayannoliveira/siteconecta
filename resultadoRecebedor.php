<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"/>
</head>
<body style="background-image:url(&quot;assets/img/vfvf4.png&quot;);">
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
                    
                    $retorno= $obj->listarRecebedor($id);
                   // var_dump($retorno);
                    //var_dump($retorno);
                    
                    foreach ($retorno as $objConectaPA) {

                        // Pegando id de doadorMateriais
                            $idD=$objConectaPA->getIdDoadorMateriais();
                            //echo $idD; OK
                     
                        //Criando DAODoadorMateriais

                        $objDoadorMateriais= new DAODoadorMateriais();
                        $retornoDoadorMaterial= $objDoadorMateriais->listarDoadorMaterial($idD);
                        $idMaterial=$retornoDoadorMaterial->getIdMateriaisf();
                        $tipo=$retornoDoadorMaterial->getTipoDM();
                        //ok
                                //Criando DAOMateriais
                        $objmaterial= new DAOMateriais();
                        $retornoMaterial= $objmaterial->listarM($idMaterial);
                        $nomeMaterial= $retornoMaterial->getNomeMateriais();

                        //var_dump($nomeMaterial); ok
                            //Criando Doador
                        $idDoador=$retornoDoadorMaterial->getIdDoadorf();
                        //var_dump($idDoador); ok
                        $objDoador= new DAODoador();
                        $retonoDoador= $objDoador->listarDoador($idDoador);
                        
                        
                        
                        

                        //var_dump($retonoDoador);
                        
                ?>   
                    <tr>
                        <td style="background-color: #ffffff;"> <?php echo $nomeMaterial; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $tipo; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $retonoDoador->getNomeDoador(); ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $retonoDoador-> getEmailDoador(); ?> <label></label></td>
                        <td style="background-color: #ffffff;"> <?php echo $retonoDoador->getTextoDoador(); ?> <label></label></td>
                        <td style="background-color: #ffffff;"><?php echo  $retonoDoador->getLinkDoador();?></td>
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
     <script src="assets/js/jquery.dataTables.min.js""></script>
</body>
    </html>