<?php

namespace App\Model;

use App\Model\ClassConexao;
use PDO;

#Trata sobre as partes de cadastro de usuários no banco de dados
class ClassCliente
{
    private PDO $Db;
    private $usuario_id;

    public function __construct()
    {
        $this->Db = (new ClassConexao())->getConnection();
    }

    public function cadastrarCliente($nome, $email, $senha, $idade, $telefone)
    {
        $id = 0;
        $stmt = $this->Db->prepare("INSERT INTO usuario (id_usuario, nome, email, idade, telefone) VALUES(:id_usuario, :nome, :email, :idade, :telefone)");
        $stmt->bindParam(":id_usuario", $id,PDO::PARAM_INT);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":idade", $idade, PDO::PARAM_INT);
        $stmt->bindParam(":telefone", $telefone, PDO::PARAM_INT);

        $stmt->execute();

        $this->usuario_id = $this->Db->lastInsertId();

        $stmt = $this->Db->prepare("INSERT INTO login VALUES(:id_usuario, :senha)");
        $stmt->bindParam(":id_usuario", $this->usuario_id);
        $stmt->bindParam(":senha", $senha);

        return $stmt->execute();
     }


    public function hasClienteByEmail(string $email): bool
    {
        $stmt = $this->Db->prepare("SELECT * FROM usuario WHERE email = :email");

        $stmt->bindParam(":email", $Email,\PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
