<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="<?php echo $this->getDescription(); ?>">
    <meta name="Keywords" content="<?php echo $this->getKeywords(); ?>">
    <title><?php echo $this->getTitle();?></title>
    <link rel="stylesheet" href="<?php echo DIRCSS."Style.css"; ?>"/>
</head>
<body>
<header>
    <img class="" id="logo2" src="<?php echo DIRIMAGEM. "logoOficial.png";?>" alt="logo">
    <nav>
        <ul class="links">
            <li><a href="home">Home</a></li>
            <li><a href="comprar-veiculo">Compra</a></li>
            <li><a href="sobre-nos">Sobre nós</a></li>
        </ul>
    </nav>
    <a class="B">
        <?php if(!isset($_SESSION['usuario'])) { ?>
            <a class="login" href = "<?php echo DIRPAGE.'login'; ?>" ><button > Logar</button ></a >
        <?php } else{ ?>
            <a class="login" href = "<?php echo DIRPAGE.'login/logout'; ?>" ><button > Sair</button ></a >
        <?php } ?>
</header>
<div id="border"></div>
<!--img----------------------------------------------->
<div class="carro">
    <img src="img/banner.jpg" alt="carro">
</div>
<!--img----------------------------------------------->
<main>
    <u>
        <h1 id="titulo">Carros mais buscados</h1>
    </u>
    <div class="container">
        <div class="item">
            <div id="title-style">
                <h1>Puma GTS</h1>
            </div>
            <img class="img" src="<?php echo DIRIMAGEM.'puma-gts.jpg' ?>">
        </div>
        <div class="item">
            <div id="title-style">
                <h1>Ford Maverick GT77</h1>
            </div>
            <img class="img" src="<?php echo DIRIMAGEM.'ford-maverick.jpg' ?>">
        </div>
        <div class="item">
            <div id="title-style">
                <h1>Mercedes-benz 280</h1>
            </div>
            <img class="img" src="<?php echo DIRIMAGEM.'mercedes-benz-280se.jpg';?>">
        </div>
    </div>
</main>
<!--------------------------------------------------->
<footer>
    <div id="teste">
        <img class="logo" src="<?php echo DIRIMAGEM.'logoOficial.png'?>" alt="logo" style="padding-top: 20px;">
    </div>
    <div class="footer">
        <h1>Endereço</h1>
        <p>Rua Sept</P>
    </div>
    <div class="footer">
        <h1>Telefone</h1>
        <p>(41) 3321-0200</p>
    </div>
</footer>
</body>

</html>