<?php
#Arquivo despachante

namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes
{
    /*Atributos*/
    private $Method;
    private $Parameter=[];
    private $Obj;

    protected function getMethod() { return $this->Method; }
    public function setMethod($Method) { $this->Method = $Method; }

    protected function getParam() { return $this->Parameter; }
    public function setParam($Parameter) { return $this->Parameter = $Parameter; }

    /*Método construtor*/
    public function __Construct()
    {
        self::AddController();
    }

    /*Função de adição de Controller*/
    private function AddController()
    {
        $rotaController = $this->getRota();
        $nameS = "App\\Controller\\{$rotaController}";
        $this->Obj = new $nameS;

        if(isset($this->parseurl()[1]))
        {
            self::AddMethod();
        }
    }

    /*Método para adição de método do Controller*/
    private function AddMethod()
    {
        if (method_exists($this->Obj, $this->parseurl()[1]))
        {
            $this->setMethod("{$this->parseurl()[1]}");
            self::AddParam();
            call_user_func_array([$this->Obj, $this->getMethod()], $this->getParam());
        }
    }

    private function AddParam()
    {
        $CountArray =  count($this->parseurl());
        if ($CountArray > 2)
        {
            foreach($this->parseurl() as $Key => $value)
            {
                if ($Key > 1)
                {
                    $this->setParam($this->Parameter += [$Key => $value]);
                }
            }
        }
    }
}