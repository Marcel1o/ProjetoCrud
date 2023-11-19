<?php
    session_start();
?>    


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Nossos Produtos</title>
    

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

            echo '<p>Nome: '.$value['Nome'].' | Quantidade: '.$value['Quantidade'].' | Preço: R$'.($value['Quantidade']*(float)$value['Preco']).'<a href="?editar =<?php echo $key ?>"> Editar produto! </a>  <a class="btn btn-sm btn-danger" href="deletar.php?id='.$value['id'].'" title="Deletar">Excluir</a></p>';
            echo '<hr>';
            
        }
        
    ?>
</body>

</html>