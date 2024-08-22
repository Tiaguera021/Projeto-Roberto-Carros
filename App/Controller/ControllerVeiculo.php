<?php

namespace App\Controller;

use App\Model\ClassVeiculo;

class ControllerVeiculo extends Controller
{
    private $id_carro;
    private $marca;
    private $modelo;
    private $ano;
    private $versao;
    private $quilometragem;
    private $preco;
    private $blindado;
    private $imagem;

    private $veiculoModel;

    public function __construct()
    {
        parent::__construct();
        $this->veiculoModel = new ClassVeiculo();
    }

    public function getSanitizedParameters(): void
    {
        foreach ($_POST AS $key => $post) {
            $this->$key = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function checkEmptyVariables(): void
    {
        foreach ($_POST AS $key => $post) {
            if ( empty($this->$key) ) {
               $this->addMessageBag("error", "O campo `${$key}` não pode ficar em branco!");
                header('Location: ' .DIRPAGE. 'cadastrar-veiculo');
                exit();
            }
        }
    }

    public function index(): void
    {
        if ($this->isMethod("POST")) {
            $this->getSanitizedParameters();
        }
        $veiculos = $this->veiculoModel->findVeiculosBy(
            $this->marca,
            $this->modelo,
            $this->ano,
            $this->versao,
            $this->quilometragem,
            $this->preco,
            $this->blindado,
            $this->imagem
        );

        $this->render('Veiculo/Index', [
            'veiculos' => $veiculos
        ]);
    }

    public function comprarVeiculo(?int $idCarro = null): void
    {
        #Verifica se o ID do carro existe no banco
        if (isset($idCarro)) {
            $this->getSanitizedParameters();
        } else {
            $this->addMessageBag("error","Carro não encontrado!");
            header('Location: '.DIRPAGE. 'comprar-veiculo');
            exit();
        }
        #Exclui o carro do banco de dados, simulando a compra e retirada do estoque
        $this->veiculoModel->limpaEstoque($this->id_carro);
        $this->addMessageBag("success", "Carro comprado com sucesso!");
        header('Location: '.DIRPAGE. 'mostrar-veiculos');
        exit();
    }

    public function cadastrarVeiculo()
    {
        if ( $this->isMethod("POST") ) {
            $this->getSanitizedParameters();
            $this->checkEmptyVariables();

            $this->veiculoModel->cadastrarVeiculo(
                $this->marca,
                $this->modelo,
                $this->ano,
                $this->versao,
                $this->quilometragem,
                $this->preco,
                $this->blindado,
                $this->imagem
            );
            $this->addMessageBag("success", "Carro cadastrado com sucesso!");

            header('Location: '.DIRPAGE.'mostrar-veiculos');
            exit();
        }

        $this->render("Veiculo/CadastrarVeiculo");
    }

}
