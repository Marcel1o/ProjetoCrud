<?php 
    function read_Produtos($connection){
        $sql = "SELECT * FROM produtos ORDER BY id DESC";
        $result = $connection->query($sql);
        return $result;
    }

    function create_Produtos($connection,$foto,$nome,$quantidade,$preco){
        $sql_select = "SELECT * FROM produtos WHERE nome = '$nome'";
        $result_sql = mysqli_query($connection, $sql_select);
        $num_rows = mysqli_num_rows($result_sql);
        $result = mysqli_fetch_array($result_sql);
        if($num_rows > 0)
        {
            $quantidade = $result['Quantidade']+1;
            $id = $result['id'];
            $sql_update = "UPDATE produtos SET Quantidade = '$quantidade' WHERE id='$id'";
            $result_update = mysqli_query($connection, $sql_update);
        }else{
            $sql = "INSERT INTO produtos(foto,nome,quantidade,preco)values('$foto','$nome','$quantidade','$preco')";
            $result_insert = mysqli_query($connection, $sql);

        }
    }
    
    



?>