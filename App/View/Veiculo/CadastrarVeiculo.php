<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro novos veículos</title>
    <link rel="stylesheet" href="<?php echo DIRCSS. "CadastramentodeCarros.css"?>">
    <link rel="stylesheet" href="<?php echo DIRCSS."bootstrap.min.css"; ?>">
    <script src="<?php echo DIRJS."bootstrap.bundle.min.js"; ?>" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-whitish-yellow">
<header class="bg-navtamanho">
    <img class="" id="logo2" src="<?php echo DIRIMAGEM. "logoOficial.png";?>" alt="logo">
    <nav>
        <ul class="links">
            <li class="bg-item-nav-tamanho">
                <a class="bg-kid-bengala" aria-current="home" href="/">Home</a>
            </li>
            <li class="bg-item-nav-tamanho">
                <a class="bg-kid-bengala" href="mostrar-veiculos">Comprar</a>
            </li>
            <li class="bg-item-nav-tamanho">
                <a class="bg-kid-bengala" href="sobre-nos">Sobre nós</a>
            </li>
        </ul>
    </nav>

    <a class="btn btn-sm bg-white rounded-pill" style="height: 40px; width: 100px" href = "<?php echo DIRPAGE.'logout'; ?>"> Sair</a>

</header>
<?php include DIRREQ. 'App/View/Components/FlashMessage.php'; ?>

<div class="sec" style="display: flex; position: relative;">


<div class="container">
    <div class="card" style="height: 40rem;">
        <div class="card" style="width: 35rem;">
            <div class="card-body">
                <h5 class="card-title">Cadastro de Carros</h5>
                <form action="<?php echo DIRPAGE.'cadastrar-veiculo'; ?>" method="post">
                    <label>Marca:</label>
                    <div class="form-floating">
                        <input class="form-control" type="text" id="marca" name="marca" placeholder="Digite a marca">
                        <label for="marca">Marca</label>
                    </div>

                    <label for="modelo">Modelo:</label>
                    <div class="form-floating">
                        <input class="form-control" type="text" id="nome" name="modelo" placeholder="Digite o nome">
                        <label for="nome">Nome</label>
                    </div>

                    <label for="ano">Ano:</label>
                    <div class="form-floating">
                        <input class="form-control" type="number" id="ano" name="ano" placeholder="Digite o ano">
                        <label for="ano">Ano</label>
                    </div>

                        <label for="versao">Versão:</label>
                    <div class="form-floating">
                        <input class="form-control" type="text" id="versao" name="versao" placeholder="Digite a versão">
                        <label for="versao">Versão</label>
                    </div>

                    <div class="form-group">
                        <label for="blindado">Blindado:</label>
                        <select class="form-control" id="blindado" name="blindado">
                            <option value="">Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>

                    <label for="quilometragem">Quilometragem:</label>
                    <div class="form-floating">
                        <input class="form-control" type="number" id="quilometragem" name="quilometragem" placeholder="Digite a quilometragem">
                        <label for="quilometragem">Quilometragem</label>
                    </div>

                    <label for="preco">Preço:</label>
                    <div class="form-floating">
                        <input class="form-control" type="number" id="preco" name="preco" placeholder="Digite o preço">
                        <label for="preco">Preço</label>
                    </div>

                    <div class="form-group">
                        <label for="imagem">Imagem:</label>
                        <input class="form-control" type="file" id="imagem" name="imagem" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <div class="preview-image">
                        <img id="preview" src="#" alt="Preview da Imagem" style="display: none;">
                    </div>

                    <div class="d-flex flex-row justify-content-center align-items-center pt-3">
                        <button id="create" type="submit" class="btn btn-lg bg-yellow" value="adicionarCarros">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</body>
</html>