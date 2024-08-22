<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos</title>
    <link rel="stylesheet" href="<?php echo DIRCSS."Compra.css"; ?>">
</head>

<body>
<header>
    <img class="logo" id="logo2" src="<?php echo DIRIMAGEM."logo.png";?>" alt="logo">
    <nav>
        <ul class="links">
            <li><a href="<?php echo DIRPAGE ?>">Home</a></li>
            <li><a href="<?php echo DIRPAGE.'mostrar-veiculos'?>">Compra</a></li>
            <li><a href="<?php echo DIRPAGE.'sobre-nos'?>">Sobre nós</a></li>
        </ul>
    </nav>
    <div class="B">
        <?php if(!isset($_SESSION['usuario'])) { ?>
            <a class="button" href = "<?php echo DIRPAGE.'login'; ?>" >Logar</a>
        <?php } else{ ?>
            <a class="button" href = "<?php echo DIRPAGE.'logout'; ?>" >Sair</a>
        <?php } ?>
    </div>
</header>
<form name="FormSelect" id="FormSelect" action="<?php echo DIRPAGE.'mostrar-veiculos';?>" method="post">
    <div class="teste">
        <input class="pesquisa" type="text" name="modelo" placeholder="Pesquisar por modelo">
        <button class="pesquisa-btn" type="submit" value="Pesquisar">🔍</button>
    </div>
</form>

<?php include DIRREQ. 'App/View/Components/FlashMessage.php'; ?>

<div class="container">
    <div class="sidebar">
        <h2 style="text-align: center;">Filtros</h2>
        <form id="car-filters" action="<?php echo DIRPAGE.'mostrar-veiculos';?>" method="post">
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
            foreach ($veiculos AS $C) {
                echo "<form name='FormComprar' id='FormComprar' action='".DIRPAGE."comprar-veiculo/".$C['Id_carro']."' method='post'> <!-- Passa o ID do carro para URL para recuperar mais tarde e usar no método de compra -->
                <div class='card'>
                    <div class='card'>
                        <img src='" . htmlspecialchars($C['Imagem']) . "' alt='Imagem do carro'>
                        <div class='align-items-start'>
                            <input type='hidden' name='id_carro' value='".$C['Id_carro']."'>
                            <h1 id='title' style='font-family:Arial Black;'>" . htmlspecialchars($C['Marca']) . " ".htmlspecialchars($C['Modelo'])." (".htmlspecialchars($C['Ano']).")</h1>
                            <h3 id='item' style='font-size: 20px'>".htmlspecialchars($C['Versao'])."</h3>
                            <h4 id='item'>KM: ".htmlspecialchars($C['Quilometragem'])."</h4>
                            <h4 id='item'>Blindado: ".htmlspecialchars($C['Blindado'] == '1' ? 'sim' : 'não')."</h4>
                        </div>
                        <div class='buy-button'>
                            <span>R$ " . htmlspecialchars($C['Preco']) . "</span>
                            <button type='submit' value='comprarVeiculos'>Comprar</button>
                        </div>
                    </div>
                </div>
            </form>";
            }
        ?>
    </div>

</div>
</body>
</html>
