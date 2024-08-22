<?php

namespace App\Controller;

class ControllerSobreNos extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('SobreNos/SobreNos');
    }
}