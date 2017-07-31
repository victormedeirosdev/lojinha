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
        $visualizar_categ = "SELECT * FROM `categoria_prod` ORDER BY `categoria_prod`.`id` ASC";
        $resultados_categ = mysqli_query($sql, $visualizar_categ);
    ?>
    
    <div class="row">
        <div class="container">
            <h6 class="center font-weight700 letter-spacing-1 padding20">CADASTRO DE NOVO PRODUTO</h6>
            <form action="cadastro_prod_db.php" method="post">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input placeholder="" id="nome_prod" name="nome_prod" type="text" class="validate" autocomplete="off" required>
                    <label class="active" for="first_name">Nome do novo produto</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                  <label>Selecione a categoria</label>
                  <select class="browser-default" name="categoria_prod" autocomplete="off" required>
                    <option value="" disabled selected>selecione a categoria</option>
                    <?php while ($rows_categ = mysqli_fetch_assoc($resultados_categ)){ ?>
                        <option value="<?php echo $rows_categ['id']; ?>"><?php echo $rows_categ['nome']; ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                  <label for="textarea">Observações sobre o produto (opicional)</label>
                  <textarea id="textarea" class="materialize-textarea" name="obs_prod" autocomplete="off" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <p class="center"><button class="btn waves-effect waves-light white-text black z-depth-0 font-weight700 letter-spacing-1" type="submit" name="action">CADASTRAR</button></p>
                </div>
            </div>
            </form>
        </div>
    </div>
    
    <a id="btn_add" href="cadastro_venda.php" class="btn-floating btn-large waves-effect waves-light btn pink z-depth-1 font-weight700"><i class="material-icons">add</i></a>
    
    <?php include_once("js/scripts.js"); ?>
    
</body>
</html>
        