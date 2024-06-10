<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="<?php echo $this->getDescription(); ?>">
    <meta name="Keywords" content="<?php echo $this->getKeywords(); ?>">
    <title><?php echo $this->getTitle(); ?></title>
    <link rel="stylesheet" href="<?php echo DIRCSS."CriarConta.css"; ?>">
</head>
<body>
<div class="form-container-logar">
        <div class="exit"><a href="home"><svg id="xcircle" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                </svg></a></div>
        <form id="form">
            <h1>Login</h1>
            <input name="email" clas="login-input" type="Email" placeholder="Email">
            <input name="senha" clas="login-input" type="password" placeholder="Senha">
            <a href="#" class="password">Esqueci minha senha</a>
        </form>
        <div class="horizontalbar" >
            <button id="enter" type="submit" value="/LogarUsuario">Entrar</button>
            <a href="cadastrar">Criar Conta</a>
        </div>
</div>

</body>
</html>