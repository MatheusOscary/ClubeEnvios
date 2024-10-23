<?php
namespace ClubeEnvios\V1\Model;

use Laminas\Db\Adapter\Adapter;
use \ClubeEnvios\V1\Rest\Cotacao\CotacaoEntity;
class CotacaoModel 
{
    protected $dbAdapter;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }


    public function fazerCotacao(CotacaoEntity $cotacao){
        $sql = "SELECT 
        vtex_valores.id_servico,
        servicos.nm_servico,
        transportadoras.nm_transportadora,
        vtex_valores.prazo_entrega,
        vtex_valores.valor
        FROM vtex_valores 
        INNER JOIN servicos ON vtex_valores.id_servico = servicos.id
        INNER JOIN transportadoras ON servicos.id_transportadora = transportadoras.id
        WHERE  ". $cotacao->getCep() ." BETWEEN cep_inicio AND cep_final
        AND ". $cotacao->getPeso() ."  BETWEEN peso_inicial AND peso_final
        ORDER BY valor ASC
        LIMIT 1;";
        
        $stmt = $this->dbAdapter->createStatement($sql);
        $result = $stmt->execute();
        $row = $result->current();

        if($row) {
            $cotacao->setIdServico($row["id_servico"]);
            $cotacao->setServico($row["nm_servico"]);
            $cotacao->setTransportadora($row["nm_transportadora"]);
            $cotacao->setPrazoEntrega($row["prazo_entrega"]);
            $cotacao->setValor($row["valor"]);
            $id_cotacao = $this->InsertCotacao($cotacao);
            $cotacao->setIdCotacao($id_cotacao);
        }

        return $cotacao;

        
    }       
    public function InsertCotacao(CotacaoEntity $cotacao){
        $sql = "INSERT INTO Cotacao (id_usuario, id_servico, valor) VALUES (?, ?, ?); ";
        $stmt = $this->dbAdapter->createStatement($sql, [
            $cotacao->getIdUsuario(),
            $cotacao->getIdServico(),
            $cotacao->getValor()
        ]);
        $stmt->execute();
        return $this->dbAdapter->getDriver()->getLastGeneratedValue();
    }
    public function SelectId($id, $userid){
        $sql = "SELECT Cotacao.id_cotacao as id_cotacao, nm_servico as servico, valor 
        FROM Cotacao 
        INNER JOIN servicos ON Cotacao.Id_servico = servicos.id 
        WHERE Cotacao.id_cotacao = ". $id ." AND id_usuario = ". $userid ."";
        $stmt = $this->dbAdapter->createStatement($sql);
        $result = $stmt->execute();
        return $result->current();
    }
    public function Select($userid){
        $sql = "SELECT Cotacao.id_cotacao as id_cotacao, nm_servico as servico, valor 
        FROM Cotacao 
        INNER JOIN servicos ON Cotacao.Id_servico = servicos.id 
        WHERE id_usuario = ". $userid ."";
        $stmt = $this->dbAdapter->createStatement($sql);
        $result = $stmt->execute();
        return $result;
    }
}