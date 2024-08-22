<?php
    namespace Src\Routes;

class Router {
    protected array $routes = [];
    private array $params = [];

    public function setParams($params): void
    {
        $this->params = $params;
    }

    public function getParams(): array
    {
        return $this->params;
    }
    private function addRoute($route, $controller, $action, $method): void
    {
        $route = preg_replace('/{[^\/]+}/', '([^\/]+)', $route); //Substitui parâmetros na rota
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action): void
    {
        $this->addRoute($route, $controller, $action, "GET");
    }
    public function post($route, $controller, $action): void
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch(): void
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        $matchedRoute = null;

        foreach ( $this->routes[$method] AS $route => $controllerAction ) {
            $pattern = "@^" . $route . "$@";
            if (preg_match($pattern, $uri, $matches)) {
                $matchedRoute = $controllerAction;
                array_shift($matches); //remove primeiro item(rota completa)
                $this->setParams($matches); //parametros restantes
                break;
            }
        }

        if ($matchedRoute) {
            $controller = $matchedRoute['controller'];
            $action = $matchedRoute['action'];

            $controller = new $controller();
            call_user_func_array([$controller, $action], $this->getParams());
        } else {
            $this->render404();
        }
    }

    protected function render404(): void
    {
        http_response_code(404);
        include DIRREQ . 'App/View/Erros/404.php';
        exit();
    }
}
