<?php

namespace App\Model;

use App\Model\ClassConexao;
use App\Model\ClassCadastrar;

#Arquivo para tratar com os dados de login de usuário
class ClassLogar extends ClassConexao
{
    private $Db;

    #Verifica se o e-mail já está cadastrado no banco de dados
    protected function findByEmail($Email)
    {
        $this->Db=$this->conexaoDB()->prepare("SELECT * FROM usuario WHERE email = :email");

        $this->Db->bindParam(":email", $Email,\PDO::PARAM_STR);
        $this->Db->execute();

        return $this->Db->rowCount();
    }

    #Busca pelo usuário no banco de dados através do e-mail e senha
    protected function findUsuario($Email, $Senha)
    {
        $this->Db=$this->conexaoDB()->prepare("SELECT * FROM usuario WHERE email = :email");
        $this->Db->bindParam(':email', $Email, \PDO::PARAM_STR);
        $this->Db->execute();

        $this->usuario_id=$this->Db->fetch(\PDO::FETCH_ASSOC);
        $Id_user=$this->usuario_id['id_usuario'];

        $this->Db=$this->conexaoDB()->prepare("SELECT u.* FROM usuario u JOIN login using (id_usuario) WHERE email=:email AND senha=:senha");
        $this->Db->bindParam('email',$Email,\PDO::PARAM_STR);
        $this->Db->bindParam('senha', $Senha, \PDO::PARAM_STR);
        $this->Db->execute();

        return $this->Db->fetch(\PDO::FETCH_ASSOC);
    }

}