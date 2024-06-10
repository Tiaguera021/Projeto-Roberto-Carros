
<!DOCTYPE html>
<html lang="en">
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
    <img class="logo" id="logo" src="<?php echo DIRIMAGEM. "logo.png" ;?>" alt="logo">
    <nav>
        <ul class="links">
            <li><a href="home">Home</a></li>
            <li><a href="comprar-veiculo">Compra</a></li>
            <li><a href="Ajuda.html">Ajuda</a></li>
        </ul>
    </nav>
    <div class="B">
        <a href="login"><button class="button">Entrar</button></a>
    </div>
</header>

<div class="teste">
    <input class="pesquisa" type="text" placeholder="Pesquisar">
    <button class="pesquisa-btn">🔍</button>
</div>

<div class="container">
    <div class="sidebar">
        <h2 style="text-align: center;">Filtros</h2>
        <form id="car-filters">
            <div class="filter">
                <label for="marca">Marca:</label>
                <select id="marca" name="marca">
                    <option value="">Selecione</option>
                    <option value="ford">Ford</option>
                    <option value="chevrolet">Chevrolet</option>
                    <option value="toyota">Toyota</option>
                </select>
            </div>

            <div class="filter">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" placeholder="Digite o modelo">
            </div>

            <div class="filter">
                <label for="ano">Ano:</label>
                <input type="number" id="ano" name="ano" placeholder="Digite o ano">
            </div>

            <div class="filter">
                <label for="versao">Versão:</label>
                <input type="text" id="versao" name="versao" placeholder="Digite a versão">
            </div>

            <div class="filter">
                <label for="blindado">Blindado:</label>
                <select id="blindado" name="blindado">
                    <option value="">Selecione</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>

            <div class="filter">
                <label for="quilometragem">Quilometragem:</label>
                <input type="number" id="quilometragem" name="quilometragem" placeholder="Digite a quilometragem">
            </div>

            <div class="filter">
                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" placeholder="Digite o preço">
            </div>

            <div class="filter">
                <button type="submit">Aplicar Filtros</button>
            </div>
        </form>
    </div>

    <div class="itens">
        <div class="card">
            <img src="<?php echo DIRIMAGEM."img.png"; ?>" alt="">
            <h1 id="title">Nome do carro</h1>
            <div class="buy-button">
                <span>Valor do carro</span>
                <button>Comprar</button>
            </div>
        </div>

        <div class="card">
            <img src="<?php echo DIRIMAGEM."img.png"; ?>" alt="">
            <h1 id="title">Nome do carro</h1>
            <div class="buy-button">
                <span>Valor do carro</span>
                <button>Comprar</button>
            </div>
        </div>

        <div class="card">
            <img src="<?php echo DIRIMAGEM."img.png"; ?>" alt="">
            <h1 id="title">Nome do carro</h1>
            <div class="buy-button">
                <span>Valor do carro</span>
                <button>Comprar</button>
            </div>
        </div>

        <div class="card">
            <img src="<?php echo DIRIMAGEM."img.png"; ?>" alt="">
            <h1 id="title">Nome do carro</h1>
            <div class="buy-button">
                <span>Valor do carro</span>
                <button>Comprar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
