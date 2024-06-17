<?php
namespace Src\Classes;

use Src\traits\TraitUrlParser;

#Arquivo para configurar as URLs
class ClassRoutes
{

    use TraitUrlParser;

    private $rotas;

    /*Método de retorno da URL*/
    public function getRota()
    {
        $Url = $this->parseurl();
        $i = $Url[0];

        #array que inclui as URLs e atribui cada uma a uma Controller
        $this->rotas=array(
            ""=>"ControllerHome",
            "home"=>"ControllerHome",
            "login"=>"ControllerLogin",
            "cadastrar"=>"ControllerCadastrar",
            "cadastrar-veiculo"=>"ControllerCadastrarVeiculo",
            "comprar-veiculo"=>"ControllerComprarVeiculo",
            "sobre-nos"=>"ControllerSobreNos"
        );

        if (array_key_exists($i, $this->rotas))
        {
            if (file_exists(DIRREQ."App/Controller/{$this->rotas[$i]}.php"))
            {
                return $this->rotas[$i];
            }else
            {
                return "ControllerHome";
            }
        }else
        {
            return  "Controller404";
        }
    }
}