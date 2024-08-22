
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nós</title>
    <link rel="stylesheet" href="<?php echo DIRCSS.'Sobre.css'?>">
</head>

<body>
<!-- Inclusão de scripts para ícones do Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<header>
    <img class="logo" id="logo2" src="<?php echo DIRIMAGEM. "logoOficial.png";?>" alt="logo">
    <nav>
        <ul class="links">
            <li><a href="/">Home</a></li>
            <li><a href="mostrar-veiculos">Compra</a></li>
            <li><a href="sobre-nos">Sobre nós</a></li>
        </ul>
    </nav>
    <a class="B">
        <?php if(!isset($_SESSION['usuario'])) { ?>
            <a class="login" href = "<?php echo DIRPAGE.'login'; ?>" ><button > Logar</button ></a >
        <?php } else{ ?>
            <a class="login" href = "<?php echo DIRPAGE.'logout'; ?>" ><button > Sair</button ></a >
        <?php } ?>
        <div>
</header>

<div id="title">Sobre nós</div>
<!-- Título da seção "Sobre nós" -->

<div id="container-about-Us">
    <!-- Seção de descrição sobre a empresa -->
    <h1><u>Roberto Carros</u></h1>
    <p>
        <strong>
            Somos um site dedicado exclusivamente à compra de carros antigos, conectando entusiastas e colecionadores com
            uma ampla variedade de veículos clássicos. Oferecemos um espaço seguro e confiável para negociações, com um
            catálogo diversificado e anúncios detalhados que garantem transparência em todas as transações. Se você é
            apaixonado por carros vintage e busca um veículo especial, aqui é o lugar certo para encontrar o carro dos seus
            sonhos. Venha explorar nosso acervo e faça parte da nossa comunidade!
        </strong>
    </p>
</div>

<main>
    <!-- Conteúdo principal da página -->
    <div class="main-container">
        <h1 style="font-family: Vollkorn;">Contatos</h1>
        <div id="container-contacts">
            <!-- Seção de contatos -->
            <p>Entre em contato pelo Numero:</p>
            <a href="#">
                <p id="number">
                    <!-- Ícone de telefone com número de contato -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    </svg>
                    (41) 3321-0200
                </p>
            </a>
        </div>
    </div>
</main>

<div id="container-socialmidia">
    <!-- Seção de redes sociais -->
    <h1>Redes sociais</h1>
    <div class="container-socialmidia-icons">
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
    </div>
</div>

<footer>
    <!-- Rodapé da página -->
    <div id="footer-horizontal-bar">
        <img class="logo" src="<?php echo DIRIMAGEM.'logoOficial.png'?>" alt="logo" style="padding-top: 20px;">
    </div>
    <div class="footer"></div>
    <div class="footer">
        <div id="developed">
            <h2>Desenvolvido por</h2>
            <a href="https://github.com/viniciusabpr?tab=repositories">Vinicius de Abreu Pereira</a>,
            <a href="https://github.com/Tiaguera021">Tiago Salles</a>,
            <a href="https://www.linkedin.com/in/marcelrodrigs/?originalSubdomain=br">Marcel Rodrigues</a>
        </div>
    </div>
</footer>
</body>

</html>
