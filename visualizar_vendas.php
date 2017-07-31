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
        
        $visualizar_vendas = "(SELECT * FROM `vendas` ORDER BY `vendas`.`id`  DESC)";
        $resultados_vendas = mysqli_query($sql, $visualizar_vendas);
    
    ?>
    
    <div class="row">
        <div class="container">
          <table class="striped">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>VALOR</th>
                  <th>DATA</th>
                  <th class="hide-on-small-only">HORA</th>
                  <th class="hide-on-small-only">MENSAGEM</th>
                  <th>AÇÕES</th>
              </tr>
            </thead>

            <tbody>
                
              <?php
                
                while ($rows_vendas = mysqli_fetch_assoc($resultados_vendas)){
              
              ?>
                  <tr>
                    <td><?php echo $rows_vendas['id']; ?></td>
                    <td><?php echo "R$".$rows_vendas['valor']; ?></td>
                    <td>
                        <?php
                            // FORMATAÇÃO DA DATA BRASIL       
                            $data_format =  strtotime($rows_vendas['data_venda']);
                            echo date('d/m/Y', $data_format);                                                     
                        ?>
                    </td>
                    <td class="hide-on-small-only"><?php echo $rows_vendas['hora_venda']; ?></td>  
                      <?php 
                        if (empty($rows_vendas['mensagem'])){
                            echo "<td class='hide-on-small-only grey-text'>Nenhuma observação cadastrada.</td>";
                        } else {
                            echo "<td class='hide-on-small-only'>".$rows_vendas['mensagem']."</td>";
                        } 
                      ?>
                    <td>
                        <a href=""><i class="material-icons green-text tooltipped" data-position="top" data-delay="50" data-tooltip="Visualizar">visibility</i></a>
                        <a href=""><i class="material-icons grey-text tooltipped" data-position="top" data-delay="50" data-tooltip="Editar">edit</i></a>
                        <a href=""><i class="material-icons red-text tooltipped" data-position="top" data-delay="50" data-tooltip="Deletar">delete_forever</i></a>
                    </td>
                  </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="row center padding20">
                <?php 
                    if ($result=mysqli_query($sql, $visualizar_vendas)){
                        // Return the number of rows in result set
                        $rowcount=mysqli_num_rows($result);
                        printf("<strong>%d</strong> vendas encontradas.\n",$rowcount);
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
        