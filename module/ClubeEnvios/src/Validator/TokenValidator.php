<?php
namespace ClubeEnvios\Validator;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Laminas\ApiTools\ApiProblem\ApiProblem;

class TokenValidator
{
    protected $secretKey = '123444566666'; 

    /**
     * Valida o token JWT no cabeçalho
     * @param string $authorizationHeader
     * @return array|ApiProblem
     */
    public function validateToken(string $authorizationHeader)
    {
        list($jwt) = sscanf($authorizationHeader, 'Bearer %s');

        if (!$jwt) {
            return new ApiProblem(400, 'Formato do token incorreto.');
        }

        try {
            $decoded = JWT::decode($jwt, new Key($this->secretKey, 'HS256'));
            return ['decoded' => $decoded, 'status' => 200];
        } catch (\Exception $e) {
            return new ApiProblem(401, 'Token inválido ou expirado.');
        }
    }

    /**
     * Obtém o cabeçalho de autorização
     * @param array $headers
     * @return string|ApiProblem
     */
    public function getAuthorizationHeader(array $headers)
    {
        if (!isset($headers['Authorization'])) {
            return new ApiProblem(401, 'Token não fornecido.');
        }
        
        return $headers['Authorization'][0];
    }

    /**
     * Processa a requisição para validar o token JWT
     * @param array $headers
     * @return array|ApiProblem
     */
    public function processRequest(array $headers)
    {
        $authorizationHeader = $this->getAuthorizationHeader($headers);
        
        if ($authorizationHeader instanceof ApiProblem) {
            return $authorizationHeader;
        }

        return $this->validateToken($authorizationHeader);
    }
}
