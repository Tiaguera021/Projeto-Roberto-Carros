<?php

namespace App\Model;

use PDO;

#Arquivo para tratar com os dados de login de usuário
class ClassLogin
{
    private PDO $Db;

    public function __construct()
    {
        $this->Db = (new ClassConexao())->getConnection();
    }

    #Verifica login do usuario pelo e-mail e senha.
    public function findUsuarioByEmailAndSenha($Email, $Senha)
    {
        $stmt = $this->Db->prepare("SELECT DISTINCT(u.id_usuario), u.* FROM usuario u JOIN login l WHERE email=:email AND senha=:senha");
        $stmt->bindParam('email',$Email,\PDO::PARAM_STR);
        $stmt->bindParam('senha', $Senha, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}