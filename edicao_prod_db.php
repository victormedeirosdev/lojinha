<?php
    
    //CONEXÃO COM O BANCO DE DADOS.
    include_once("config/config.php");
    include_once("config/connection.php");

    $id_prod = mysqli_real_escape_string($sql, $_POST['id_prod']);
    $nome_prod = mysqli_real_escape_string($sql, $_POST['nome_prod']);
    $categoria_prod = mysqli_real_escape_string($sql, $_POST['categoria_prod']);
    $obs_prod = mysqli_real_escape_string($sql, $_POST['obs_prod']);

    echo "$id_prod - $nome_prod - $categoria_prod - $obs_prod";

?>