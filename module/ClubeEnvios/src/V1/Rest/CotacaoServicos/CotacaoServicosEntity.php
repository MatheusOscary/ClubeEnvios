<?php
namespace ClubeEnvios\V1\Rest\CotacaoServicos;

class CotacaoServicosEntity
{
    private $idServico;
    private $nmServico;
    private $idTransportadora;
    private $nmTransportadora;

    public function getIdServico()
    {
        return $this->idServico;
    }

    public function setIdServico($idServico)
    {
        $this->idServico = $idServico;
    }

    public function getNmServico()
    {
        return $this->nmServico;
    }

    public function setNmServico($nmServico)
    {
        $this->nmServico = $nmServico;
    }

    public function getIdTransportadora()
    {
        return $this->idTransportadora;
    }

    public function setIdTransportadora($idTransportadora)
    {
        $this->idTransportadora = $idTransportadora;
    }

    public function getNmTransportadora()
    {
        return $this->nmTransportadora;
    }

    public function setNmTransportadora($nmTransportadora)
    {
        $this->nmTransportadora = $nmTransportadora;
    }
}
