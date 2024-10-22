<?php
namespace ClubeEnvios\V1\Model;

use Laminas\Db\Adapter\Adapter;

class AuthModel extends UserModel
{
    protected $dbAdapter;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function salvarAccessToken($token, $userId)
    {
        $sql = "INSERT INTO access_token (access_token, id_usuario, expires_in, dt_criacao) VALUES (?, ?, ?, ?)";
        $stmt = $this->dbAdapter->createStatement($sql, [
            $token,
            $userId,
            (new \DateTime('+1 hour'))->format('Y-m-d H:i:s'),  
            (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
        $stmt->execute();
    }
}
