<?php

        $sql = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die (mysql_error());
        mysqli_set_charset($sql, CHARSET) or die (mysql_error());
        
        if ($sql->connect_error){
            echo "Conexão com o banco de dados falhou.";
        } else {
            //conexão funcionou.
        }
    
?>