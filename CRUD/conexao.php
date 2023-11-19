<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'projeto';
    
    $connection = new mysqli($server,$user,$password,$database);

    // if($connection->connect_error)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>