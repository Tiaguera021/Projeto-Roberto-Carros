<?php

namespace App\Model;

use App\Model\ClassConexao;
use PDO;
#Arquivo para tratar sobre tudo referente aos carros no sistema
class ClassVeiculo
{
    private PDO $Db;

    public function __construct()
    {
        $this->Db = (new ClassConexao())->getConnection();
    }

    public function cadastrarVeiculo($marca, $Modelo, $ano, $versao, $quilometragem, $preco, $blindado, $imagem): void
    {
        $id = 0;
        $blindado = $blindado === 'sim';
        $imagemDir = DIRIMAGEM. $imagem;
        $stmt = $this->Db->prepare("INSERT INTO carro (id_carro, marca, modelo, ano, versao, quilometragem, preco, blindado, imagem) VALUES(:id_carro, :marca, :modelo, :ano, :versao, :quilometragem, :preco, :blindado, :imagem)");
        $stmt->bindParam("id_carro", $id, \PDO::PARAM_INT);
        $stmt->bindParam("marca", $marca, \PDO::PARAM_STR);
        $stmt->bindParam("modelo", $Modelo, \PDO::PARAM_STR);
        $stmt->bindParam("ano", $ano, \PDO::PARAM_INT);
        $stmt->bindParam("versao", $versao, \PDO::PARAM_STR);
        $stmt->bindParam("quilometragem", $quilometragem, \PDO::PARAM_INT);
        $stmt->bindParam("preco", $preco, \PDO::PARAM_STR);
        $stmt->bindParam("blindado", $blindado, \PDO::PARAM_BOOL);
        $stmt->bindParam("imagem", $imagemDir, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function findVeiculosBy($marca, $modelo, $ano, $versao, $quilometragem, $preco, $blindado, $imagem): ?array
    {
        #Verifica se os campos do filtro estão vazios, senão retorna WHERE TRUE
        $where = 'WHERE TRUE';
        if (!empty($marca)) {
            $marca='%'.$marca.'%';
            $where .= " AND marca LIKE '{$marca}'";
        }
        if (!empty($modelo)) {
            $modelo='%'.$modelo.'%';
            $where .= " AND modelo LIKE '{$modelo}'";
        }
        if (!empty($ano)) {
            $where .= " AND ano = {$ano}";
        }
        if (!empty($versao)) {
            $versao='%'.$versao.'%';
            $where .= " AND versao LIKE '{$versao}'";
        }
        if (!empty($quilometragem)) {
            $quilometragem='%'.$quilometragem.'%';
            $where .= " AND quilometragem LIKE '{$quilometragem}'";
        }
        if (!empty($preco)) {
            $where .= " AND preco BETWEEN 0 AND {$preco}";
        }
        if (!empty($blindado)) {
            $blindado = $blindado === 'sim' ? 'true' : 'false';
            $where .= " AND blindado = {$blindado}";
        }
        if (!empty($imagem)) {
            $imagem='%'.$imagem.'%';
            $where .= " AND imagem = {$imagem}";
        }
        $stmt = $this->Db->query("SELECT * FROM carro {$where}");

        $Array = [];
        $I = 0;

        #Como é usado para carregar todos os carros do banco quando acessa a página de compra, transforma tudo em um array
        while ($Fetch = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $Array[$I] = [
            'Id_carro' => $Fetch['id_carro'],
            'Marca' => $Fetch['marca'],
            'Modelo' => $Fetch['modelo'],
            'Ano' => $Fetch['ano'],
            'Versao' => $Fetch['versao'],
            'Quilometragem' => $Fetch['quilometragem'],
            'Preco' => $Fetch['preco'],
            'Blindado' => $Fetch['blindado'],
            'Imagem' => $Fetch['imagem']
            ];
            $I++;
        }

        return $Array;
    }

    public function limpaEstoque($id_carro)
    {
        $stmt = $this->Db->prepare("DELETE FROM carro WHERE id_carro = :id_carro");
        $stmt->bindParam("id_carro", $id_carro, \PDO::PARAM_INT);
        $stmt->execute();
    }
}
