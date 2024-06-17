<?php

namespace App\Model;

use App\Model\ClassConexao;
use App\Model\ClassVerificaEmail;

#Trata sobre as partes de cadastro de usuários no banco de dados
class ClassCadastrar extends ClassConexao
{
    private $Db;
    private $usuario_id;

    protected function CadastroClientes($Nome, $Email, $Idade, $Telefone)
    {
     $Id=0;
     $this->Db=$this->conexaoDB()->prepare("insert into usuario (id_usuario, nome, email, idade, telefone) values(:id_usuario, :nome, :email, :idade, :telefone)");
     $this->Db->bindParam(":id_usuario", $Id,\PDO::PARAM_INT);
     $this->Db->bindParam(":nome", $Nome,\PDO::PARAM_STR);
     $this->Db->bindParam(":email", $Email,\PDO::PARAM_STR);
     $this->Db->bindParam(":idade", $Idade, \PDO::PARAM_INT);
     $this->Db->bindParam(":telefone", $Telefone, \PDO::PARAM_INT);
     return $this->Db->execute();
     }


    protected function Complete($Senha, $Email)
    {
        $this->Db=$this->conexaoDB()->prepare("SELECT * FROM usuario WHERE email = :email");

        $this->Db->bindParam(":email", $Email,\PDO::PARAM_STR);
        $this->Db->execute();

        $this->usuario_id=$this->Db->fetch(\PDO::FETCH_ASSOC);
        $Id_user = $this->usuario_id['id_usuario'];
        $this->Db=$this->conexaoDB()->prepare("insert into login values(:id_usuario, :senha)");
        $this->Db->bindParam(":id_usuario", $Id_user, \PDO::PARAM_STR);
        $this->Db->bindParam(":senha", $Senha, \PDO::PARAM_STR);
        return $this->Db->execute();
    }

    protected function findByEmail($Email)
    {
        $this->Db=$this->conexaoDB()->prepare("SELECT * FROM usuario WHERE email = :email");

        $this->Db->bindParam(":email", $Email,\PDO::PARAM_STR);
        $this->Db->execute();

        return $this->Db->rowCount();
    }
}
