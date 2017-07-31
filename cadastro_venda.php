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
    
    <div class="row">
        <div class="container">
            <h6 class="center font-weight700 letter-spacing-1 padding20">CADASTRO DE NOVA VENDA</h6>
            <form action="cadastro_venda_db.php" method="post">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input placeholder="R$0.00" id="valor_venda" name="valor_venda" type="text" class="validate" autocomplete="off" required>
                    <label class="active" for="first_name">Valor da venda</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                  <label>Selecione o produto</label>
                  <select class="browser-default" name="produto_venda" autocomplete="off" required>
                    <option value="" disabled selected>selecione o produto</option>
                    <option value="1">Brinco</option>
                    <option value="2">Colar</option>
                    <option value="3">Pulseira</option>
                  </select>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                  <label>Selecione a quantidade</label>
                  <select class="browser-default" name="quantidade_venda" autocomplete="off" required>
                    <option value="" disabled selected>selecione a quantidade</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                  <label for="textarea">Mensagem sobre a venda</label>
                  <textarea id="textarea" class="materialize-textarea" name="mensagem_venda" autocomplete="off"></textarea>
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
        