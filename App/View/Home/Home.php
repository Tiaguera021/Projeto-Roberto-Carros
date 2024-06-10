<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="<?php echo $this->getDescription(); ?>">
    <meta name="Keywords" content="<?php echo $this->getKeywords(); ?>">
    <title><?php echo $this->getTitle(); ?></title>
    <link rel="stylesheet" href="<?php echo DIRCSS."Style.css"; ?>"/>
    <!-- script src="script.js"></script -->
    <?php echo $this->AddHead(); ?>
</head>

<body>
<header>
    <div class="Header">
        <?php echo $this->AddHeader();?>
    </div>
    <img class="logo" id="logo" src="<?php echo DIRIMAGEM. "logo.png" ;?>" alt="logo">

    <nav>
        <ul class="links">
            <li><a href="home">Home</a></li>
            <li><a href="comprar-veiculo">Compra</a></li>
            <li><a href="Ajuda.html">Ajuda</a></li>
        </ul>
    </nav>
    <a class="B">
        <a class="login" href="<?php echo DIRPAGE.'login'; ?>"><button>login</button></a>
    <div>
</header>
<div id="border"></div>
<!--img----------------------------------------------->
<div class="carro">
    <img src="<?php echo DIRIMAGEM."carro.jpeg"?>" alt="carro">
</div>
<!--img----------------------------------------------->

<!---------------------------------------------------->
<main>
    <div class="Main">
        <?php echo $this->AddMain(); ?>
    </div>
    <h1 id="titulo">Carros mais buscados</h1>
    <div class="container">
        <div class="item">
            <h1>Carro Poggers</h1>
            <img class="img" src="<?php echo DIRIMAGEM. 'img.png' ?>">
        </div>
        <div class="item">
            <h1>Carro Poggers</h1>
            <img class="img" src="<?php echo DIRIMAGEM. 'img.png' ?>">
        </div>
        <div class="item">
            <h1>Carro Poggers</h1>
            <img class="img" src="<?php echo DIRIMAGEM. 'img.png' ?>">
        </div>
    </div>
</main>
<!--------------------------------------------------->
<footer>
    <div class="Footer">
        <?php echo $this->AddFooter(); ?>
    </div>
    <div id="teste">
        <img class="logo" src="<?php echo DIRIMAGEM. 'logo.png' ?>" alt="logo">
    </div>
    <div class="A"        >
        <div class="footer">
            <h1>Endereço</h1>
            <p>Rua asflasfasf</P>
        </div>
        <div class="footer">
            <h1>Telefone</h1>
            <p>(41) 3321-0200</p>
        </div>
        <div id="developed"><u>Desenvolvido por V,M,T</u></div>

</footer>
</body>
</html>
