<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerComprarVeiculo extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        $this->setTitle("Comprar");
        $this->setDescription("Esta é a tela para comprar veiculos do nosso site");
        $this->setKeywords("MVC, home, carros clássicos");
        $this->setDir("comprar-veiculo/");
        $this->RenderComprarVeiculo();
    }
}