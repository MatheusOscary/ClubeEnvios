<?php
namespace ClubeEnvios\V1\Rest\Auth;
use ClubeEnvios\V1\Model\AuthModel;
use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;
use Laminas\Stdlib\Parameters;
use Firebase\JWT\JWT;
use DateTime;

class AuthResource extends AbstractResourceListener
{
    protected $authModel;
    protected $dbAdapter;

    public function __construct(AuthModel $authModel)
    {
        $this->authModel = $authModel;
    }

    /**
     * 
     * @param mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return $this->login($data);
    }
    /**
     * 
     * @param mixed $data
     * @return ApiProblem|mixed
     */
    protected function login($data)
    {
        
        $user = $this->authModel->verificaLogin($data->login);
        
        if (!$user) {
            return new ApiProblem(404, 'Login ou senha inválidos.');
        }

        if (!password_verify($data->password, $user['senha'])) {
            return new ApiProblem(401, 'Login ou senha inválidos.');
        }

        $token = $this->gerarToken($user['id']);
        
        $this->authModel->salvarAccessToken($token, $user['id']);
        $horaatual = new DateTime();
        $expirationTime = $horaatual->modify('+1 hour');

        return [
            'access_token' => $token,
            'expires_in' =>  $expirationTime->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * Gerar token
     * 
     * @param int $userId
     * @return string
     */
    protected function gerarToken($userId)
    {
        $key = '123444566666'; 
        $horaatual = new DateTime();
        $expirationTime = $horaatual->modify('+1 hour')->getTimestamp();  
        $config = [
            'iat' => time(),
            'exp' => $expirationTime,
            'sub' => $userId,
        ];

        return JWT::encode($config, $key, "HS256");
    }
}