<?php
namespace ClubeEnvios\V1\Rest\Cotacao;

class CotacaoEntity
{
    private $idCotacao;
    private $idUsuario;
    private $idServico;
    private $prazo_entrega;
    private $servico;
    private $transportadora;
    private $peso;
    private $cep;
    private $valor;

    public function getIdCotacao()
    {
        return $this->idCotacao;
    }

    public function setIdCotacao($idCotacao)
    {
        $this->idCotacao = $idCotacao;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdServico()
    {
        return $this->idServico;
    }

    public function setIdServico($idServico)
    {
        $this->idServico = $idServico;
    }

    public function getPrazoEntrega()
    {
        return $this->prazo_entrega;
    }

    public function setPrazoEntrega($prazo_entrega)
    {
        $this->prazo_entrega = $prazo_entrega;
    }

    public function getServico()
    {
        return $this->servico;
    }

    public function setServico($servico)
    {
        $this->servico = $servico;
    }

    public function getTransportadora()
    {
        return $this->transportadora;
    }

    public function setTransportadora($transportadora)
    {
        $this->transportadora = $transportadora;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
}
