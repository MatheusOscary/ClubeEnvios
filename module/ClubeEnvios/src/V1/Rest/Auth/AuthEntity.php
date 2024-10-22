<?php
namespace ClubeEnvios\V1\Rest\Auth;

class AuthEntity
{
    private $accessToken;
    private $login;
    private $senha;
    private $expiraEm;
    private $dtCriacao;

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getExpiraEm()
    {
        return $this->expiraEm;
    }

    public function setExpiraEm($expiraEm)
    {
        $this->expiraEm = $expiraEm;
    }

    public function getDtCriacao()
    {
        return $this->dtCriacao;
    }

    public function setDtCriacao($dtCriacao)
    {
        $this->dtCriacao = $dtCriacao;
    }
}
