<?php

namespace App\Controller;

use App\Model\Classveiculos;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassConexao;
use App\Controller\ControllerHome;

class ControllerCadastrarVeiculo extends Classveiculos
{
    protected $Marca;
    protected $Modelo;
    protected $Ano;
    protected $Versao;
    protected $Quilometragem;
    protected $Preco;
    protected $Blindado;
    protected $Imagem;
    public function __construct()
    {
        if ( !isset($_SESSION['usuario']) ) {
            $_SESSION['messageBag'] = "Realize o login para acessar!";
            header('Location: '.DIRPAGE. 'login');
            exit();
        }

        $Render=new ClassRender();
        $Render->setTitle("Cadastrar Veiculo");
        $Render->setDescription("Está é a página para cadastrar veículos pelo administrador!");
        $Render->setKeywords("MVC, Cadastrar, Veiculos, Administrador");
        $Render->setDir('cadastrar-veiculo/');
        $Render->RenderCadVeiculo();
    }

    public function emptyFieldCheck()
    {
        if ( empty($this->Marca) OR empty($this->Modelo) OR empty($this->Ano) OR empty($this->Versao) OR empty($this->Quilometragem) OR empty($this->Preco) OR empty($this->Blindado) OR empty($this->Imagem)) {
            $_SESSION['messageBag'] = "Não pode deixar campos em branco!";
            header('Location: ' .DIRPAGE. 'cadastrar-veiculo/');
            exit();
        }
    }

    public function RecVar()
    {
        if (isset($_POST['marca']))
        {
            $this->Marca=filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['modelo']))
        {
            $this->Modelo=filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['ano']))
        {
            $this->Ano=filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['versao']))
        {
            $this->Versao=filter_input(INPUT_POST, 'versao', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['quilometragem']))
        {
            $this->Quilometragem=filter_input(INPUT_POST, 'quilometragem', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['preco']))
        {
            $this->Preco=filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blindado']))
        {
            $this->Blindado=filter_input(INPUT_POST, 'blindado', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['imagem']))
        {
            $this->Imagem=filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    public function adicionarCarros()
    {
        $this->RecVar();
        $this->emptyFieldCheck();
        $this->cadastrarVeiculo($this->Marca, $this->Modelo, $this->Ano, $this->Versao,
        $this->Quilometragem, $this->Preco, $this->Blindado, $this->Imagem);
        header('Location: '.DIRPAGE.'home');
        exit();
    }

}