<?php

namespace App\Model;

use App\Model\ClassConexao;

#Arquivo para tratar sobre tudo referente aos carros no sistema
class Classveiculos extends ClassConexao
{
private $Db;

protected function cadastrarVeiculo($Marca, $Modelo, $Ano, $Versao, $Quilometragem, $Preco, $Blindado, $Imagem)
{
    $Id=0;
    $Blindado = $Blindado === 'sim' ? true : false;
    $ImagemDir= DIRIMAGEM. "$Imagem";
    $this->Db = $this->conexaoDB()->prepare("INSERT INTO carro (id_carro, marca, modelo, ano, versao, quilometragem, preco, blindado, imagem) VALUES(:id_carro, :marca, :modelo, :ano, :versao, :quilometragem, :preco, :blindado, :imagem)");
    $this->Db->bindParam("id_carro", $Id, \PDO::PARAM_INT);
    $this->Db->bindParam("marca", $Marca, \PDO::PARAM_STR);
    $this->Db->bindParam("modelo", $Modelo, \PDO::PARAM_STR);
    $this->Db->bindParam("ano", $Ano, \PDO::PARAM_INT);
    $this->Db->bindParam("versao", $Versao, \PDO::PARAM_STR);
    $this->Db->bindParam("quilometragem", $Quilometragem, \PDO::PARAM_INT);
    $this->Db->bindParam("preco", $Preco, \PDO::PARAM_STR);
    $this->Db->bindParam("blindado", $Blindado, \PDO::PARAM_BOOL);
    $this->Db->bindParam("imagem", $ImagemDir, \PDO::PARAM_STR);
    $this->Db->execute();
}

protected function selectVeiculos($Marca, $Modelo, $Ano, $Versao, $Quilometragem, $Preco, $Blindado, $Imagem)
{
    #Verifica se os campos do filtro estão vazios, senão retorna WHERE TRUE
    $where = 'WHERE TRUE';
    if (!empty($Marca)) {
        $Marca='%'.$Marca.'%';
        $where .= " AND marca LIKE '{$Marca}'";
    }
    if (!empty($Modelo)) {
        $Modelo='%'.$Modelo.'%';
        $where .= " AND modelo LIKE '{$Modelo}'";
    }
    if (!empty($Ano)) {
        $where .= " AND ano = {$Ano}";
    }
    if (!empty($Versao)) {
        $Versao='%'.$Versao.'%';
        $where .= " AND versao LIKE '{$Versao}'";
    }
    if (!empty($Quilometragem)) {
        $Quilometragem='%'.$Quilometragem.'%';
        $where .= " AND quilometragem LIKE '{$Quilometragem}'";
    }
    if (!empty($Preco)) {
        $where .= " AND preco BETWEEN 0 AND {$Preco}";
    }
    if (!empty($Blindado)) {
        $Blindado = $Blindado === 'sim' ? 'true' : 'false';
        $where .= " AND blindado = {$Blindado}";
    }
    if (!empty($Imagem)) {
        $Imagem='%'.$Imagem.'%';
        $where .= " AND imagem = {$Imagem}";
    }
    $this->Db = $this->conexaoDB();
    $Bfetch = $this->Db->prepare("SELECT * FROM carro {$where}");

    $Bfetch->execute();

    $Array = [];
    $I = 0;

    #Como é usado para carregar todos os carros do banco quando acessa a página de compra, transforma tudo em um array
    while ($Fetch = $Bfetch->fetch(\PDO::FETCH_ASSOC)) {
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

    protected function limpaEstoque($Id_carro)
    {
        $Bfetch=$this->conexaoDB()->prepare("DELETE FROM carro WHERE id_carro = :id_carro");
        $Bfetch->bindParam("id_carro", $Id_carro, \PDO::PARAM_INT);
        $Bfetch->execute();
    }
}
