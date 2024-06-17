<?php

namespace App\Controller;

use App\Model\Classveiculos;
use App\Model\ClassConexao;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerComprarVeiculo extends Classveiculos
{
    private $Id_carro;
    private $Marca;
    private $Modelo;
    private $Ano;
    private $Versao;
    private $Quilometragem;
    private $Preco;
    private $Blindado;
    private $Imagem;

    public function __construct()
    {
        $Render = new ClassRender();
        $Render->setTitle("Comprar");
        $Render->setDescription("Esta é a tela para comprar veículos do nosso site");
        $Render->setKeywords("MVC, home, carros clássicos");
        $Render->setDir("comprar-veiculo/");
        $Render->RenderComprarVeiculo();
    }

    public function RecVar()
    {
        if (isset($_POST['marca']))
        {
            $this->Marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['modelo']))
        {
            $this->Modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['ano']))
        {
            $this->Ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['versao']))
        {
            $this->Versao = filter_input(INPUT_POST, 'versao', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['quilometragem']))
        {
            $this->Quilometragem = filter_input(INPUT_POST, 'quilometragem', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['preco']))
        {
            $this->Preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blindado']))
        {
            $this->Blindado = filter_input(INPUT_POST, 'blindado', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['imagem']))
        {
            $this->Imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function mostrarVeiculos()
    {
        $this->RecVar();
        $B = $this->selectVeiculos($this->Marca, $this->Modelo, $this->Ano, $this->Versao, $this->Quilometragem, $this->Preco, $this->Blindado, $this->Imagem);

        #Carrega cada carro cadastrado no banco dentro de um container assim que acessa a tela de compra
        foreach ($B as $C) {
            echo "
            <form name='FormComprar' id='FormComprar' action='".DIRPAGE."comprar-veiculo/comprarVeiculos/".$C['Id_carro']."' method='post'> <!-- Passa o ID do carro para URL para recuperar mais tarde e usar no método de compra -->
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
            </form>
        ";
        }
    }

    public function comprarVeiculos($Id_carro)
    {
        #Verifica primeiro se o usuário está logado para acessar
        if ( !isset($_SESSION['usuario']) ) {
            $_SESSION['messageBag'] = "Realize o login para acessar!";
            header('Location: '.DIRPAGE. 'login');
            exit();
        }

        #Verifica se o ID do carro existe no banco
        if (isset($Id_carro)) {
            $this->Id_carro = filter_input(INPUT_POST, 'id_carro', FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $_SESSION['messageBag'] = "Carro não encontrado!";
            header('Location: '.DIRPAGE. 'comprar-veiculo');
            exit();
        }

        #Exclui o carro do banco de dados, simulando a compra e retirada do estoque
        $this->limpaEstoque($this->Id_carro);
        $_SESSION['messageBag'] = "Carro comprado com sucesso!";
        header('Location: '.DIRPAGE. 'comprar-veiculo');
        exit();
    }

}
