<?php
    session_start();
?>    


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Nossos Produtos</title>
    

    <link rel="stylesheet" href="../styles/lista.css">
</head>

<body>

    <h1> <a href="home.php"> Página Home </a></h1>
    <hr>
    <br>
    <h2> Lista de Itens </h2>

    <div class="lista-container">

<?php

    $items = array(['nome' => 'Arroz 1kg' , 'imagem' => '../arroz.png', 'preco' => '5'],
        ['nome' => 'Coca Cola 2l' ,'imagem' => '../coca.png', 'preco' => '10'],
        ['nome' => 'Cuscuz' ,'imagem' => '../cuscuz.png', 'preco' => '2'],
        ['nome' => 'Leite 1l' ,'imagem' => '../leite.png', 'preco' => '8']);

    foreach ($items as $key => $value) {
?>
        <div class="produto">
            <img src="<?php echo $value['imagem'] ?>" />
            <a href="?adicionar=<?php echo $key ?>"> Adicionar à lista! </a>
        </div> <!--produto -->

<?php
    }
?>
    </div>

    <?php
        if(isset($_GET['adicionar'])){
            //vamos add à lista.
            $idProduto = (float) $_GET['adicionar'];
            if(isset($items[$idProduto])){
                if(isset($_SESSION["lista1"][$idProduto])){
                    $_SESSION["lista1"][$idProduto]['quantidade']++;
                }else{
                    $_SESSION["lista1"][$idProduto] = array('quantidade' =>1,'nome'=>$items[$idProduto]['nome'], 'preco'=> $items[$idProduto]['preco']);
                }
                echo '<script>alert("Item adicionado");</script>';
            }else{
                die('Não é possível adicionar um produto que não existe.');
            }
        }

    ?>

    <h2 class="title">Lista de compras:</h2>
    <?php
        foreach ($_SESSION["lista1"] as $key => $value) {
            //nome
            //quantidade
            //preco

            echo '<p>Nome: '.$value['nome'].' | Quantidade: '.$value['quantidade'].' | Preço: R$'.($value['quantidade']*(float)$value['preco']). '</p>';
            echo '<hr>';
        }
    ?>
</body>

</html>