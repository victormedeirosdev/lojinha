      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/maskmoney.js"></script>
    
        <script type="text/javascript">
            $(function(){
                $("#valor_venda").maskMoney({symbol:'R$ ', showSymbol:true,thousands:'.', decimal:',', symbolStay: true});
            })
        </script>    
    
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

        <script>
            $(document).ready(function() {
                $(".dropdown-button").dropdown();
            });
        </script>

        <script>
            $(document).ready(function(){
                $('.tooltipped').tooltip({delay: 50});
            });
        </script>