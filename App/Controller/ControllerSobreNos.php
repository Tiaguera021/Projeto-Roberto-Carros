<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerSobreNos extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        $Render = new ClassRender();
        $Render->setTitle("Comprar");
        $Render->setDescription("Esta é a tela para comprar veículos do nosso site");
        $Render->setKeywords("MVC, home, carros clássicos");
        $Render->setDir("comprar-veiculo/");
        $Render->RenderSobreNos();
    }
}