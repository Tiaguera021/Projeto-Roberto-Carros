<?php

namespace App\Controller;

use App\Model\ClassLogar;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

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
        $this->Logar($this->Email, $this->Senha);
        echo "Parabéns, você está logado!";
    }
}