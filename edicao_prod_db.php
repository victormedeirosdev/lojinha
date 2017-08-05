<?php
    
    //CONEXÃO COM O BANCO DE DADOS.
    include_once("config/config.php");
    include_once("config/connection.php");

    $id_prod = mysqli_real_escape_string($sql, $_POST['id_prod']);
    $nome_prod = mysqli_real_escape_string($sql, $_POST['nome_prod']);
    $categoria_prod = mysqli_real_escape_string($sql, $_POST['categoria_prod']);
    $obs_prod = mysqli_real_escape_string($sql, $_POST['obs_prod']);

    date_default_timezone_set('America/Sao_Paulo');
    $data_edicao = date ("Y/m/d");
    $hora_edicao = date ("H:i:s");

    $altera_prod = "UPDATE produtos SET nome = '$nome_prod', categoria = '$categoria_prod', obs_prod = '$obs_prod', data_edicao = '$data_edicao', hora_edicao = '$hora_edicao' WHERE id = '$id_prod'";
    $altera_query = mysqli_query($sql, $altera_prod);

    header("Location: visualizar_prod.php");

?>
