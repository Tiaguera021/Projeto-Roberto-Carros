<?php

namespace App\Controller;

use App\Model\ClassLogar;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassCadastrar;
class ControllerLogin extends ClassLogar
{
    private $Email;
    private $Senha;
    public function __construct()
    {
        $Render=new ClassRender();
        $Render->setTitle("Login");
        $Render->setDescription("Está é a tela para você logar");
        $Render->setKeywords("MVC, home, carros clássicos, login");
        $Render->setDir("login/");
        $Render->RenderLogin();
    }

    public function RecVar()
    {
        if(isset($_POST['email']))
        {
            $this->Email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['senha']))
        {
            $this->Senha=filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }


    public function LogarUsuario()
    {
        $this->RecVar();
        $NaoTemCadastro = $this->findByEmail($this->Email);
        if ($NaoTemCadastro == 0){
            $_SESSION['messageBag'] = "Este e-mail não está cadastrado";
            header('Location: '.DIRPAGE.'login' );
            exit();
        }
        $Usuario = $this->findUsuario($this->Email, $this->Senha);

        if (empty($Usuario))
        {
            $_SESSION['messageBag'] = "E-mail ou senha incorretos!";
            header('Location: '.DIRPAGE.'login' );
            exit();
        }
        $_SESSION['usuario'] = $Usuario;
        header('Location: '.DIRPAGE. 'home');
    }
    public function logout()
    {
        unset($_SESSION['usuario']);
        header('Location: '.DIRPAGE. 'login');
        exit();
    }
}