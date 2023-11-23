<?php

    if(!empty($_GET['id']))
    {   
        include_once('conexao.php');
        


        $id = $_GET['id'];
        
        $sqlSelect = "SELECT * FROM produtos WHERE id = '$id'";

        $result_sql = $connection->query($sqlSelect);
        $result = mysqli_fetch_array($result_sql);
        $num_rows = mysqli_num_rows($result_sql);
        
        if($num_rows > 0)
        {
            $Quantidade= $result['Quantidade'];
            ?><!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editar</title>
            </head>
            <body>
            <div class='modal-body'>
                                <div class='item-info'>
                                    <?php echo "<h1>".$result['Nome']."</h1>"?>
                                    <?php echo "<h1>".$result['Preco']."</h1>"?>
                                </div>
                                <div class='item-altera'>
                                    <form  method='post'>
                                        <label for='Quantidade'>Quantidade:</label>
                                    <?php echo  "<input type='number' id='Quantidade' name='Quantidade' required value=".$Quantidade.">" ?>
                                        <input type='submit' value='Submit'>
                                    </form>
                                </div>
                            </div>
     
            </body>
            </html>
        <?php
        }
                if($_SERVER["REQUEST_METHOD"]=='POST'){
                    $Quantidade = $_POST['Quantidade']; 
                    echo "<script>console.log(".$Quantidade.")</script>";
                    $sqlUpdate = "UPDATE produtos set Quantidade='$Quantidade' WHERE id='$id'";
                    require_once('conexao.php');
                    $resultUpdate = $connection->query($sqlUpdate);
                    header('Location: lista.php');
                }   
    }
?>