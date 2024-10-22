<?php
namespace ClubeEnvios\V1\Rest\User;
use ClubeEnvios\V1\Model\UserModel;
use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;

class UserResource extends AbstractResourceListener
{
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {   
        $user = new UserEntity($data->name, $data->login, password_hash($data->password, PASSWORD_DEFAULT));
        $row = $this->userModel->verificaLogin($user->getLogin());
        if($row){   
            return new ApiProblem(409, 'Já existe um usuário cadastrado com esse login.');
        }

        
        $senhaHash = password_hash($data->password, PASSWORD_DEFAULT);
        try {
            $this->userModel->InsertUsuario($user);
            
            return [
                'message' => 'O usuário foi criado com sucesso.',
                'id' =>  $this->userModel->ultimoId(),
            ];
        } catch (\Exception $e) {
            return new ApiProblem(500, 'Erro ao cadastrar o usuário: ' . $e->getMessage());
        }
    }
}
