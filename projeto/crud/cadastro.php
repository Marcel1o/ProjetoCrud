<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
    <link rel="stylesheet" href="../styles/cadastro.css">
</head>

<body>
    <header>
        <div id="cabecalho">
            <img src="logo.png" id="foto">
        </div>    
        Formulário de Cadastro
    </header> <br> <br>
    <div id="form">

        <form>
            <div class="cx"> <label>Nome</label>
                <input type="text" placeholder="Insira Seu Nome" id="login">
            </div>
            <div class="cx"> <label>Senha</label>
                <input type="password" placeholder="Insira Sua Senha" id="senha"> <br> <br>
            </div>
            <button type="submit" id="botãoCadastro"> Enviar </button> 


        </form>
    </div>
    <div id="home">
        <a class="p1" href="home.php"> Voltar </a>
    </div>
    <script src="cadastro.js"></script>
</body>

</html>
