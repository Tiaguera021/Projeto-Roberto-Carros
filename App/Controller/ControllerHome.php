<?php

namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerHome extends Controller
{
    public function index()
    {
        $this->render('Home/Home');
    }
}