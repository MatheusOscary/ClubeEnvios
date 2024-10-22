<?php
namespace ClubeEnvios\V1\Model;
use ClubeEnvios\V1\Rest\User\UserEntity;
use Laminas\Db\Adapter\Adapter;

class UserModel
{
    protected $dbAdapter;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function verificaLogin($login)
    {
        $sql = "SELECT * FROM usuarios WHERE login = ?";
        $stmt = $this->dbAdapter->createStatement($sql, [$login]);
        $result = $stmt->execute();
        return $result->current();
    }

    public function InsertUsuario(UserEntity $user)
    {
        $sql = "INSERT INTO usuarios (nome, login, senha) VALUES (?, ?, ?)";
        $stmt = $this->dbAdapter->createStatement($sql, [$user->getNome(), $user->getLogin(), $user->getSenha()]);

        return $stmt->execute();
    }

    public function ultimoId()
    {
        return $this->dbAdapter->getDriver()->getLastGeneratedValue();
    }
}
