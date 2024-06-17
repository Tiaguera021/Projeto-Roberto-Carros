<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="<?php echo $this->getDescription(); ?>">
    <meta name="Keywords" content="<?php echo $this->getKeywords(); ?>">
    <title><?php echo $this->getTitle(); ?></title>
    <link rel="stylesheet" href="<?php echo DIRCSS."Compra.css"; ?>">
</head>

<body>
<header>
    <img class="" id="logo2" src="<?php echo DIRIMAGEM."logo.png";?>" alt="logo">
    <nav>
        <ul class="links">
            <li><a href="<?php echo DIRPAGE.'home'?>">Home</a></li>
            <li><a href="<?php echo DIRPAGE.'comprar-veiculo'?>">Compra</a></li>
            <li><a href="<?php echo DIRPAGE.'sobre-nos'?>">Ajuda</a></li>
        </ul>
    </nav>
    <div class="B">
        <?php if(!isset($_SESSION['usuario'])) { ?>
            <a class="button" href = "<?php echo DIRPAGE.'login'; ?>" >Logar</a>
        <?php } else{ ?>
            <a class="button" href = "<?php echo DIRPAGE.'login/logout'; ?>" >Sair</a>
        <?php } ?>
    </div>
</header>
<form name="FormSelect" id="FormSelect" action="<?php echo DIRPAGE.'comprar-veiculo/mostrarVeiculos';?>" method="post">
    <div class="teste">
        <input class="pesquisa" type="text" name="modelo" placeholder="Pesquisar por modelo">
        <button class="pesquisa-btn" type="submit" value="Pesquisar">🔍</button>
    </div>
</form>


<div class="container">
    <div class="sidebar">
        <h2 style="text-align: center;">Filtros</h2>
        <form id="car-filters" action="<?php echo DIRPAGE.'comprar-veiculo/mostrarVeiculos';?>" method="post">
            <div class="filter">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" placeholder="Digite a marca" value="<?= isset($_POST['marca']) ? $_POST['marca'] : '' ?>">
            </div>

            <div class="filter">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" placeholder="Digite o modelo" value="<?= isset($_POST['modelo']) ? $_POST['modelo'] : '' ?>">
            </div>

            <div class="filter">
                <label for="ano">Ano:</label>
                <input type="number" id="ano" name="ano" placeholder="Digite o ano" value="<?= isset($_POST['ano']) ? $_POST['ano'] : '' ?>">
            </div>

            <div class="filter">
                <label for="versao">Versão:</label>
                <input type="text" id="versao" name="versao" placeholder="Digite a versão" value="<?= isset($_POST['versao']) ? $_POST['versao'] : '' ?>">
            </div>

            <div class="filter">
                <label for="blindado">Blindado:</label>
                <select id="blindado" name="blindado">
                    <option value="">Selecione</option>
                    <option value="sim" <?= isset($_POST['blindado']) && $_POST['blindado'] == 'sim' ? 'selected' : ''?>>Sim</option>
                    <option value="nao" <?= isset($_POST['blindado']) && $_POST['blindado'] == 'nao' ? 'selected' : ''?>>Não</option>
                </select>
            </div>

            <div class="filter">
                <label for="quilometragem">Quilometragem:</label>
                <input type="number" id="quilometragem" name="quilometragem" placeholder="Digite a quilometragem" value="<?= isset($_POST['quilometragem']) ? $_POST['quilometragem'] : '' ?>">
            </div>

            <div class="filter">
                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" placeholder="Digite o preço" value="<?= isset($_POST['preco']) ? $_POST['preco'] : '' ?>">
            </div>

            <div class="filter">
                <button type="submit" value="mostrarVeiculos">Aplicar Filtros</button>
            </div>
        </form>
    </div>

    <div class="itens">
        <?php
        $controller = new \App\Controller\ControllerComprarVeiculo();
        $controller->mostrarVeiculos();
        ?>
    </div>

</div>
</body>
</html>
