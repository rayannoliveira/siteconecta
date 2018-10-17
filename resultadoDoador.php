 
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
                    $retorno= $obj->listar($id);
                    //var_dump($retorno);
                    
                    foreach ($retorno as $objConectaPA) {
                        // Pegando id de recebedorMateriais
                            $idR=$objConectaPA->getIdRecebedorMateriais();
                        //Criando DAORecebedorMateriais
                        $objRecebedorM= new DAORecebedorMateriais();
                        $retornoRecebedorMaterial= $objRecebedorM->listaR($idR);
                        $idMaterial= $retornoRecebedorMaterial->getIdMateriaisRf();
                        
                                //Criando DAOMateriais
                        $objmaterial= new DAOMateriais();
                        $retornoMaterial= $objmaterial->listarM($idMaterial);
                        $nomeMaterial= $retornoMaterial->getNomeMateriais();
                        
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
     <script src="assets/js/jquery.dataTables.min.js""></script>
</body>
    </html>