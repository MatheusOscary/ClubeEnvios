<?php
namespace ClubeEnvios\V1\Rest\User;
use ClubeEnvios\V1\Model\UserModel;

class UserResourceFactory
{
    public function __invoke($services)
    {
        $dbAdapter = $services->get('Database'); 
        $userModel = new UserModel($dbAdapter);
        return new UserResource($userModel);
    }
}
