<form action="depois.php" method="GET">
                <div class="table-responsive">
                     <table id="materiasCadastrados" class="table">
                        <thead>
                            <tr>
                                <th>Material</th>
                                <th>Ação</th>
                            </tr>    
                        </thead>
                <tbody id="tabela" name="tipo">
                    <?php  foreach ($retorno as $lista) {?>
                        <tr>
                            <td id="id">  
                                <?php echo $lista['idmateriaisF'];?>
                            </td>
                            <td id="acao">  
                                <?php echo $lista['tipo'];?>
                            </td>
                        </tr>
                     <?php } ?>     
                </tbody>
            </table>
        </div>
        <div class="container d-flex flex-row justify-content-center align-content-center">
            <button id="darmatch"class="btn btn-primary"  value="match" type="button" style="background-color: rgb(74,112,89);width: 126px;border-color: #fcfdfe;">Dar match</button>
            <label style="width: 62px;"></label>
                <button id="apagar"class="btn btn-primary" value="apagar" type="button" style="background-color: rgb(255,34,34);width: 125px;border-color: #fbfcfc;">Apagar</button>
         </div>
        
    </form>