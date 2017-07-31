<?php
    
    //CONEXÃO COM O BANCO DE DADOS.
    include_once("config/config.php");
    include_once("config/connection.php");

    $nome_prod = $_POST['nome_prod'];
    $categoria_prod = $_POST['categoria_prod'];
    $obs_prod = $_POST['obs_prod'];

    //date_default_timezone_set('America/Sao_Paulo');
    //$data_venda = date ("Y/m/d");
    //$hora_venda = date ("H:i:s");

    
    //Query de inserção no banco de dados.
    $inserindo_prod = "INSERT INTO produtos (nome, categoria, obs_prod) VALUES ('$nome_prod','$categoria_prod', '$obs_prod')";



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
        
    if ($sql->query($inserindo_prod) === TRUE){ ?>
    
    <div class="row">
        <div class="container">
            <h5 class="green-text text-darken-1 center margin40 font-weight700 letter-spacing-1">PRODUTO CADASTRADO COM SUCESSO.</h5>
        </div>    
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <p class="center"><a href="cadastro_prod.php" class="btn waves-effect waves-light white-text black z-depth-0 font-weight700 letter-spacing-1" name="action">NOVO PRODUTO</a></p>
        </div>
    </div>
    
    <?php } else { ?>
    <div class="row">
        <div class="container">
            <h5 class="red-text text-darken-4 center margin40 font-weight700 letter-spacing-1">ERRO AO REALIZAR CADASTRO DO PRODUTO.</h5>
        </div>    
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <p class="center"><a href="cadastro_prod.php" class="btn waves-effect waves-light white-text black z-depth-0 font-weight700 letter-spacing-1" name="action">TENTAR NOVAMENTE</a></p>
        </div>
    </div>
    <?php } ?>

    
    <?php $sql->close();  ?>
    
    <a id="btn_add" href="cadastro_venda.php" class="btn-floating btn-large waves-effect waves-light btn pink z-depth-1 font-weight700"><i class="material-icons">add</i></a>
    
    <?php include_once("js/scripts.js"); ?>
    
</body>
</html>
