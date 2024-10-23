<?php
namespace ClubeEnvios\Helper;

use ClubeEnvios\Validator\TokenValidator;
use Laminas\ApiTools\ApiProblem\ApiProblem;

class AuthorizationHelper
{
    public static function validateAuthorizationToken()
    {
        $headers = getallheaders();
   
        if (!isset($headers['Authorization'])) {
            return new ApiProblem(401, 'Cabeçalho de autorização não fornecido.');
        }

        $authorizationHeader = $headers['Authorization'];
     
        $tokenValidator = new TokenValidator();
        return $tokenValidator->processRequest(['Authorization' => [$authorizationHeader]]);
    }
}
