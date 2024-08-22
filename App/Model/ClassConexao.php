<?php
namespace App\Model;
use PDO;
use PDOException;

/*Arquivo para realizar a conexão com o banco de dados*/
class ClassConexao
{
    private string|PDO $conn;
    public function __construct()
    {
        $this->connect();
    }
    private function connect(): PDO|string
    {
        try {
            $this->conn = new PDO("mysql:host=".HOST.";dbname=".DB."; port=3306","".USER."","".PASS."");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $Erro) {
            return $Erro->getMessage();
        }

        return $this->conn;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}