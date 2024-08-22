<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="<?php echo DIRCSS."CriarConta.css"; ?>">
    <link rel="stylesheet" href="<?php echo DIRCSS."bootstrap.min.css"; ?>">

    <script src="<?php echo DIRJS."bootstrap.bundle.min.js"; ?>" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<?php include DIRREQ. 'App/View/Components/FlashMessage.php'; ?>
<div class="form-container-logar">
    <form action="<?php echo DIRPAGE. "login"?>" method="post" id="form">
        <h1>Login</h1>
        <input name="email" class="login-input" type="Email" placeholder="Email">
        <input name="senha" class="login-input" type="password" placeholder="Senha">
        <a href="criar-conta" class="password">Criar Conta</a>
        <div class="horizontalbar" >
            <form method="post" id="form">
                <button id="enter" type="submit" value="LogarUsuario">Entrar</button>
            </form>
        </div>
    </form>
</div>

</body>
</html>