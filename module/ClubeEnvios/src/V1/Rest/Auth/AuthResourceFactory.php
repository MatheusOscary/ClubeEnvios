<?php
namespace ClubeEnvios\V1\Rest\Auth;
use ClubeEnvios\V1\Model\AuthModel;

class AuthResourceFactory
{
    public function __invoke($services)
    {
        $dbAdapter = $services->get('Database'); 
        $authModel = new AuthModel($dbAdapter);
        return new AuthResource($authModel);
    }
}
