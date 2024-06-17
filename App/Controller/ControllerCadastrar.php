<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassCadastrar;
use App\Controller\ControllerHome;

class ControllerCadastrar extends ClassCadastrar
{
    protected $Nome;
    protected $Email;
    protected $Idade;
    protected $Telefone;
    protected $Senha;
    public function __construct()
    {
        $Render=new ClassRender();
        $Render->setTitle("Cadastrar");
        $Render->setDescription("Está é a tela de cadastro do nosso site");
        $Render->setKeywords("MVC, home, carros clássicos, cadastrar, criar conta");
        $Render->setDir("cadastrar/");
        $Render->RenderCadastrar();
    }

    #Verifica se há campos em branco na tela de cadastro
    public function emptyFieldCheck()
    {
        if ( empty($this->Email) OR empty($this->Senha) OR empty($this->Nome) OR empty($this->Telefone) OR empty($this->Idade) ) {
            $_SESSION['messageBag'] = "Não pode deixar campos em branco!";
            header('Location: ' .DIRPAGE. 'cadastrar/');
            exit();
        }
    }
    /*Chama as variáveis e verifica se existem*/
    public function RecVar()
    {
        if(isset($_POST['nome']))
        {
            $this->Nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['email']))
        {
            $this->Email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['idade']))
        {
            $this->Idade=filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['telefone']))
        {
            $this->Telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['senha']))
        {
            $this->Senha=filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    /*Chama o método de cadastro da ClassCadastrar*/
    public function Cadastrar()
    {
        $this->RecVar();
        $this->emptyFieldCheck();

        $temCadastro = $this->findByEmail($this->Email);

        if ( $temCadastro > 0 ) {
            $_SESSION['messageBag'] = "Email já existe!";
            header('Location: ' .DIRPAGE. 'cadastrar/');
            exit();
        }

        $this->CadastroClientes($this->Nome, $this->Email, $this->Idade, $this->Telefone);
        $this->Complete($this->Senha, $this->Email);
        header('Location: ' .DIRPAGE. 'home/');
        exit();
    }
}
