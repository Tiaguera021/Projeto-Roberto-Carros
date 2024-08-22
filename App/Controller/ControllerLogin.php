<?php

namespace App\Controller;

use App\Model\ClassLogin;
use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassCliente;
class ControllerLogin extends Controller
{
    private $email;
    private $senha;

    private $loginModel;
    public function __construct()
    {
        $this->loginModel = new ClassLogin();
    }

    public function getSanitizedParameters(): void
    {
        foreach ($_POST AS $key => $post) {
            $this->$key = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public function login(): void
    {
        if ( $this->isUserLogged() ) {
            $this->addMessageBag("success", "Você já está logado!");
            header('Location: '.DIRPAGE);
            exit();
        }
        if ($this->isMethod("POST")) {
            $this->getSanitizedParameters();

            $usuario = $this->loginModel->findUsuarioByEmailAndSenha($this->email, $this->senha);

            if (empty($usuario)) {
                $this->addMessageBag("error", "E-mail ou senha incorretos!");
                header('Location: '.DIRPAGE.'login' );
                exit();
            }
            $this->addSession("usuario", $usuario);
            header('Location: '.DIRPAGE);
            exit();
        }
        $this->render("Login/Login");
    }
    public function logout(): void
    {
        $this->removeSession('usuario');
        header('Location: '.DIRPAGE. 'login');
        exit();
    }
}