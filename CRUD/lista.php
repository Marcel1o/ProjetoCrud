<?php
    session_start();
?>    


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Nossos Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../STYLE/lista.css">
</head>

<body>
    <div id="cabecalho">
    <img src="logo.png" id="foto">
    </div>
    <hr>
    <br>
    <h2> Lista de Itens </h2>

    <div class="lista-container">

<?php

    $items = array(['nome' => 'Arroz 1kg' , 'imagem' => '../arroz.png','quantidade' => '1' , 'preco' => '5',],
        ['nome' => 'Coca Cola 2l' ,'imagem' => '../coca.png','quantidade' => '1', 'preco' => '10'],
        ['nome' => 'Cuscuz' ,'imagem' => '../cuscuz.png','quantidade' => '1', 'preco' => '2'],
        ['nome' => 'Leite 1l' ,'imagem' => '../leite.png','quantidade' => '1', 'preco' => '8']);

    foreach ($items as $key => $value) {
?>
        <div class="produto">
            <img src="<?php echo $value['imagem'] ?>" />
            <a href="?adicionar=<?php echo $key  ?>"> Adicionar à lista! </a>
        </div> <!--produto -->

<?php
    }
?>
    </div>

    <?php
        require_once "database.php";require_once "conexao.php";
        if(isset($_GET['adicionar'])){
            //vamos add à lista.
            $idProduto = (float) $_GET['adicionar'];
            if(isset($items[$idProduto])){
            create_Produtos($connection,null,$items[$idProduto]['nome'],$items[$idProduto]['quantidade'],$items[$idProduto]['preco']);
                echo '<script>alert("Item adicionado");</script>';
            }else{
                die('Não é possível adicionar um produto que não existe.');
            }
        }
    
    ?>

    <h2 class="title">Lista de compras:</h2>
    <?php
        require_once "database.php";require_once "conexao.php";
        $produtos = read_Produtos($connection);
        foreach ($produtos as $key => $value) {
            //nome
            //quantidade
            //preco

            echo '<p>Nome: '.$value['Nome'].' | Quantidade: '.$value['Quantidade'].' | Preço: R$'.($value['Quantidade']*(float)$value['Preco']).'<a href="?editar='.$value['id'].'" data-toggle="modal" data-target="#exempleModal"> Editar </a>  <a class="btn btn-sm btn-danger" href="deletar.php?id='.$value['id'].'" title="Deletar">Excluir</a></p>';
            echo '<hr>';
            
        }
        if(isset($_GET['editar'])){
            $id= (float) $_GET['editar'];
            echo "<script>console.log(".$id.");</script>";
            ?>
           
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="editar.php" id="iframe"></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            <?php
        }      
            ?>
        
<script>
    $(document).on('click','a[data-toggle]',function (e)){
        e.preventDefault();
        $("#iframe").attr("src",this.href)
    }
</script> 
</body>
</html>