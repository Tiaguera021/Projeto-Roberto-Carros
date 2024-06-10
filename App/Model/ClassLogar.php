<?php

namespace App\Model;

use App\Model\ClassConexao;

class ClassLogar extends ClassConexao
{
    private $Db;
    protected function Logar($Email, $Senha)
    {
        $this->Db=$this->conexaoDB()->prepare("select $Email from usuario");
        $this->Db=$this->conexaoDB()->prepare("select $Senha from login");
    }
}