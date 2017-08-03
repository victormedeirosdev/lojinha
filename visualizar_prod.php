<?php
    
    //CONEXÃO COM O BANCO DE DADOS.
    include_once("config/config.php");
    include_once("config/connection.php");

?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/custom.css">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <!--Let browser know website is optimized for mobile-->
    </head>

<body>
    
    <?php include_once("includes/nav.html"); ?>
    
    <?php 
        
        $visualizar_prod = "SELECT `produtos`.*,`categoria_prod`.`nome` AS categoria_nome FROM `produtos` INNER JOIN `categoria_prod` ON `produtos`.`categoria` = `categoria_prod`.`id` ORDER BY `produtos`.`id` ASC";
        $resultados_prod = mysqli_query($sql, $visualizar_prod);
    
        
    
    ?>
    
    <div class="row">
        <div class="container">
          <table class="striped">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>NOME</th>
                  <th>CATEGORIA</th>
                  <th class="hide-on-small-only">OBSERVAÇÕES</th>
                  <th>AÇÕES</th>
              </tr>
            </thead>

            <tbody>
              <?php while ($rows_prod = mysqli_fetch_assoc($resultados_prod)){ ?>
                  <tr>
                    <td><?php echo $rows_prod['id']; ?></td>
                    <td><?php echo $rows_prod['nome']; ?></td>
                    <td><?php echo $rows_prod['categoria_nome']; ?></td>
                      <?php 
                        if (empty($rows_prod['obs_prod'])){
                            echo "<td class='hide-on-small-only grey-text'>Nenhuma observação cadastrada.</td>";
                        } else {
                            echo "<td class='hide-on-small-only'>".$rows_prod['obs_prod']."</td>";
                        } 
                      ?>
                    <td>
                        <a href="#modal1<?php echo $rows_prod['id']; ?>" class="modal-trigger"><i class="material-icons green-text">assignment</i></a>
                        <!-- Modal VISUALIZAÇÃO -->

                          <div id="modal1<?php echo $rows_prod['id']; ?>" class="modal modal-fixed-footer">
                            <div class="modal-content">
                              <h5>Detalhes do produto</h5>
                              <p><strong>Código: </strong><?php echo $rows_prod['id']; ?></p>
                              <p><strong>Nome: </strong><?php echo $rows_prod['nome']; ?></p>
                              <p><strong>Categoria: </strong><?php echo $rows_prod['categoria_nome']; ?></p>
                                <?php 
                                    if (empty($rows_prod['obs_prod'])){
                                        echo "<p><strong>Observações: </strong>Nenhuma observação cadastrada.</p>";
                                    } else {
                                        echo "<p><strong>Observações: </strong>".$rows_prod['obs_prod']."</p>";
                                    } 
                                ?>
                            </div>
                            <div class="modal-footer">
                              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Fechar</a>
                            </div>
                          </div>
                        
                        <!-- Fim Modal VISUALIZAÇÃO -->
                        
                        
                        <a href="#modal2<?php echo $rows_prod['id']; ?>" class="modal-trigger"><i class="material-icons grey-text">edit</i></a>

                          <!-- Modal EDIÇÃO -->
                          <div id="modal2<?php echo $rows_prod['id']; ?>" class="modal modal-fixed-footer">
                            <div class="modal-content">
                              <h5>Edição do produto</h5>
                              <p>Código: <strong><?php echo $rows_prod['id']; ?></strong></p>
                              <form action="edicao_prod_db.php" method="post">
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        <input placeholder="" id="id_prod" name="id_prod" type="hidden" value="<?php echo $rows_prod['id']; ?>" class="validate" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        <input placeholder="" id="nome_prod" name="nome_prod" type="text" value="<?php echo $rows_prod['nome']; ?>" class="validate" autocomplete="off" required>
                                        <label class="active" for="first_name">Nome do novo produto</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                      <label>Selecione a categoria</label>
                                      <select class="browser-default" name="categoria_prod" autocomplete="off" required>
                                        <option value="" disabled selected>selecione a categoria</option>
                                        <?php 
                                            $visualizar_categ = "SELECT * FROM `categoria_prod` ORDER BY `categoria_prod`.`id` ASC";
                                            $resultados_categ = mysqli_query($sql, $visualizar_categ);                                  
                                            while ($rows_categ = mysqli_fetch_assoc($resultados_categ)){ ?>
                                            <option value="<?php echo $rows_categ['id']; ?>"><?php echo $rows_categ['nome']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                      <label for="textarea">Observações sobre o produto (opicional)</label>
                                      <textarea id="textarea" class="materialize-textarea" name="obs_prod" autocomplete="off"><?php echo $rows_prod['obs_prod']; ?></textarea>
                                    </div>
                                </div>
                            </div>                              
                            
                            <div class="modal-footer">
                              <a href="#!" class="modal-action modal-close waves-effect waves-green btn red z-depth-0">CANCELAR</a>
                              <button type="submit" class="modal-action waves-effect waves-green btn green z-depth-0">SALVAR</button>
                              </form>
                            </div>
                          </div>
                        
                        <!-- Fim Modal EDIÇÃO -->
                        
                        
                        
                        <a href=""><i class="material-icons red-text">delete_forever</i></a>
                    </td>
                  </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="row center padding20">
                <?php 
                    if ($result=mysqli_query($sql, $visualizar_prod)){
                        // Return the number of rows in result set
                        $rowcount=mysqli_num_rows($result);
                        printf("<strong>%d</strong> produtos encontradas.\n",$rowcount);
                        // Free result set
                        mysqli_free_result($result);
                    }
                ?>
          </div>
        </div>
    </div>
    
    <!-- ESTRUTURA DE MODAIS -->
    
    
    <a id="btn_add" href="cadastro_venda.php" class="btn-floating btn-large waves-effect waves-light btn pink z-depth-1 font-weight700"><i class="material-icons">add</i></a>

    
    <?php include_once("js/scripts.js"); ?>
    
</body>
</html>
        