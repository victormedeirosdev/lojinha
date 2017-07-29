<?php
    
    //CONEXÃO COM O BANCO DE DADOS.
    include_once("config/config.php");
    include_once("config/connection.php");

    $valor_venda = $_POST['valor_venda'];
    $produto_venda = $_POST['produto_venda'];
    $quantidade_venda = $_POST['quantidade_venda'];
    $mensagem_venda = $_POST['mensagem_venda'];

    date_default_timezone_set('America/Sao_Paulo');
    $data_venda = date ("Y/m/d");
    $hora_venda = date ("H:i:s");


    $inserindo_venda = "INSERT INTO vendas (valor, produto, quantidade, mensagem, data_venda, hora_venda) VALUES ('$valor_venda','$produto_venda', '$quantidade_venda', '$mensagem_venda', '$data_venda', '$hora_venda')";

    
    if ($sql->query($inserindo_venda) === TRUE){
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Infelizmente os dados não foram salvos.";
    }

    
    $sql->close();



?>
