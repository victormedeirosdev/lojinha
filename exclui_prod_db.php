<?php
    
    //CONEXÃO COM O BANCO DE DADOS.
    include_once("config/config.php");
    include_once("config/connection.php");

    $id_prod = mysqli_real_escape_string($sql, $_POST['id_prod']);

    date_default_timezone_set('America/Sao_Paulo');
    $data_exclusao = date ("Y/m/d");
    $hora_exclusao = date ("H:i:s");

    $insere_log = "INSERT INTO log_produtos (id, nome, categoria, obs_prod, user_criacao, data_criacao, hora_criacao, user_edicao, data_edicao, hora_edicao) SELECT id, nome, categoria, obs_prod, user_criacao, data_criacao, hora_criacao, user_edicao, data_edicao, hora_edicao FROM produtos WHERE id = '$id_prod'";
    $insere_query = mysqli_query($sql, $insere_log);

    $insere_log_datahora = "UPDATE log_produtos SET data_exclusao = '$data_exclusao', hora_exclusao = '$hora_exclusao' WHERE id = '$id_prod'";
    $insere_datahora_query = mysqli_query($sql, $insere_log_datahora);
    

    $exclui_prod = "DELETE FROM produtos WHERE id = '$id_prod'";
    $exclui_query = mysqli_query($sql, $exclui_prod);

    header("Location: visualizar_prod.php");

?>
