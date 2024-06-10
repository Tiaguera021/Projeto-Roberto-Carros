<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerHome extends ClassRender implements InterfaceView
{
    public function __construct()
    {
        $this->setTitle("Home");
        $this->setDescription("Esta é a home do nosso site");
        $this->setKeywords("MVC, home, carros clássicos");
        $this->setDir("home/");
        $this->RenderLayout();
    }
}