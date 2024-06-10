<?php
namespace App\Model;
/*Arquivo para realizar a conexão com o banco de dados*/
/*Cria a classe como abstrata, o que significa que ela só pode ser estendida, e não instanciada*/
abstract class ClassConexao
{
    public function conexaoDB()
    {
        try
        {
            $Con=new \PDO("mysql:host=".HOST.";dbname=".DB."; port=3307","".USER."","".PASS."");
            return $Con;
        }catch (\PDOException $Erro)
        {
            return $Erro->getMessage();
        }
}
}