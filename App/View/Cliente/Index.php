
<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>
    <link rel="stylesheet" href="<?php echo DIRCSS."CriarConta.css"; ?>">
    <link rel="stylesheet" href="<?php echo DIRCSS."bootstrap.min.css"; ?>">

    <script src="<?php echo DIRJS."bootstrap.bundle.min.js"; ?>" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<!--header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 10%;
    background-color: var(--color-brown);
    height: 35px;
}-->
<?php include DIRREQ. 'App/View/Components/FlashMessage.php'; ?>

<div class="sec" style="display: flex; position: relative;">
    <div class="exit"><a href="<?php echo isset($_SESSION['usuario']) ? '/' : '/login'?>"><svg id="xcircle" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
    </svg></a></div>
    <div id="sidebar">
    </div>
    <form action="<?php echo DIRPAGE.'criar-conta'; ?>" method="post">
        <h1>Criar Conta</h1>
        <input name="nome" placeholder="Nome" type="text">
        <input name="email" placeholder="Email" type="text">
        <input name="idade" placeholder="Idade" type="number">
        <input name="telefone" placeholder="Telefone" type="number":>
        <input name="senha" placeholder="Senha" type="password">
        <button id="create" type="submit" value="Cadastrar" >Criar</button>
    </form>
</div>
<nav></nav>

<footer>
</footer>
</body>
</html>
