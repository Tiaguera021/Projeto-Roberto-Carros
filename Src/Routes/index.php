<?php
use App\Controller\ControllerHome;
use App\Controller\ControllerVeiculo;
use Src\Routes\Router;
use \App\Controller\ControllerLogin;
use \App\Controller\ControllerCliente;
use \App\Controller\ControllerSobreNos;

$router = new Router();
/** Add new routes here  */
// Login Routes
$router->get('/login', ControllerLogin::class, 'login');
$router->post('/login', ControllerLogin::class, 'login');
$router->get('/logout', ControllerLogin::class, 'logout');
// End Login Routes
// Home Route
$router->get('/', ControllerHome::class, 'index');
// End Home Route
// Veiculo Routes
$router->get('/mostrar-veiculos', ControllerVeiculo::class, 'index');
$router->post('/mostrar-veiculos', ControllerVeiculo::class, 'index');
$router->post('/comprar-veiculo/{idCarro}', ControllerVeiculo::class, 'comprarVeiculo');
$router->get('/cadastrar-veiculo', ControllerVeiculo::class, 'cadastrarVeiculo');
$router->post('/cadastrar-veiculo', ControllerVeiculo::class, 'cadastrarVeiculo');
// End Veiculo Routes
// Cliente Routes
$router->get('/criar-conta', ControllerCliente::class, 'index');
$router->post('/criar-conta', ControllerCliente::class, 'index');
// End Cliente Routes

//Sobre Nos Route
$router->get('/sobre-nos', ControllerSobreNos::class, 'index');
//End Sobre Nos Route

/** End new routes */

$router->dispatch();