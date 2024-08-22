<?php

namespace App\Controller;

use App\Model\ClassCliente;

class ControllerCliente extends Controller
{
    protected $nome;
    protected $email;
    protected $idade;
    protected $telefone;
    protected $senha;

    private ClassCliente $clienteModel;
    public function __construct()
    {
        $this->clienteModel = new ClassCliente();

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

    public function index()
    {
        if ($this->isMethod("POST")) {
            $this->getSanitizedParameters();
            $this->checkEmptyVariables();


            if ( $this->clienteModel->hasClienteByEmail($this->email) ) {
                $this->addMessageBag("error", "E-mail já existe!");
                header('Location: ' .DIRPAGE. 'criar-conta');
                exit();
            }

            $this->clienteModel->cadastrarCliente($this->nome, $this->email, $this->senha, $this->idade, $this->telefone);
            $this->addMessageBag("success", "Usuário adicionado com sucesso");
            header('Location: ' .DIRPAGE);
            exit();
        }
        $this->render("Cliente/Index");
    }
}
