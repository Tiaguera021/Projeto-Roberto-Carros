
<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="<?php echo $this->getDescription(); ?>">
    <meta name="Keywords" content="<?php echo $this->getKeywords(); ?>">
    <title><?php echo $this->getTitle(); ?></title>
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
<?php if ( isset($_SESSION['messageBag']) ) { ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
            <?php echo $_SESSION['messageBag'];  ?>
        </div>
    </div>
<?php }?>
<?php unset($_SESSION['messageBag']); ?>
<div class="sec" style="display: flex; position: relative;">
    <div class="exit"><a href="home"><svg id="xcircle" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
            </svg></a></div>

    <div id="sidebar">
    </div>
    <form action="<?php echo DIRPAGE.'cadastrar/Cadastrar'; ?>" method="post">
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
