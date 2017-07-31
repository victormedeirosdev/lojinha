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
                        <a href=""><i class="material-icons green-text tooltipped" data-position="top" data-delay="50" data-tooltip="Ativar/Desativar">done</i></a>
                        <a href=""><i class="material-icons grey-text tooltipped" data-position="top" data-delay="50" data-tooltip="Editar">edit</i></a>
                        <a href=""><i class="material-icons red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Deletar">delete_forever</i></a>
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
    
    <a id="btn_add" href="cadastro_venda.php" class="btn-floating btn-large waves-effect waves-light btn pink z-depth-1 font-weight700"><i class="material-icons">add</i></a>

    
    <?php include_once("js/scripts.js"); ?>
    
</body>
</html>
        