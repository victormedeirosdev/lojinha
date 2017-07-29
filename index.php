

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/custom.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body>
    
<nav>
    
    <div class="nav-wrapper grey lighten-3">
    <div class="container">
      <a href="#!" class="brand-logo"><img src="img/logo.png" class="responsive-img"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html" class="black-text">PRODUTOS</a></li>
        <li><a href="sass.html" class="black-text">VENDAS</a></li>
        <li><a class="waves-effect waves-light btn black-text yellow accent-2 z-depth-0 font-weight700 letter-spacing-1">ADICIONAR VENDA</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">PRODUTOS</a></li>
        <li><a href="sass.html">VENDAS</a></li>
        <li><a class="waves-effect waves-light btn black-text yellow accent-2 z-depth-0 font-weight700 letter-spacing-1">ADICIONAR VENDA</a></li>
      </ul>
    </div>
    </div>
</nav>
    
    <div class="row">
        <div class="container">
            <h6 class="center font-weight700 letter-spacing-1 padding20">CADASTRO DE NOVA VENDA</h6>
            <form action="cadastro_venda_db.php" method="post">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input placeholder="R$0.00" id="valor_venda" name="valor_venda" type="text" class="validate">
                    <label class="active" for="first_name">Valor da venda</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                  <label>Selecione o produto</label>
                  <select class="browser-default">
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
                  <select class="browser-default">
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
                    <p class="center"><button class="btn waves-effect waves-light black-text yellow accent-2 z-depth-0 font-weight700 letter-spacing-1" type="submit" name="action">CADASTRAR</button></p>
                </div>
            </div>
            </form>
        </div>
    </div>
    
    
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    
        <script>
            $(document).ready(function(){
                $(".button-collapse").sideNav();
            });
        </script>
    
        <script>
            $(document).ready(function() {
                Materialize.updateTextFields();
            });
        </script>
    
</body>
</html>
        