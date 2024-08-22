<?php
namespace App\Controller;

class Controller {
    public function __construct()
    {
        if ( !isset($_SESSION['usuario']) ) {
            $this->addMessageBag("error", "Realize o login para acessar!");
            header('Location: '.DIRPAGE. 'login');
            exit();
        }
    }
    protected function render(string $view, ?array $data = []): void
    {
        //Extrair array de dados para incluir na view.
        extract($data);

        include DIRREQ . "App/View/$view.php";
    }

    protected function isMethod(string $method): bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) === strtoupper($method);
    }

    protected function addSession(string $name, array|string $message): void
    {
        $_SESSION[$name] = $message;
    }

    protected function getSession(string $name)
    {
        return $_SESSION[$name];
    }

    protected function removeSession(string $name): void
    {
        unset($_SESSION[$name]);
    }

    protected function addMessageBag(string $tipo, $message)
    {
        $flashMessages = $this->getSession('messageBag');
        $flashMessages[$tipo][] = $message;

        $this->addSession('messageBag', $flashMessages);
    }

    protected function isUserLogged(): bool
    {
        return isset($_SESSION['usuario']);
    }
}