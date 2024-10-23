<?php
namespace ClubeEnvios\V1\Rest\Cotacao;

use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;
use Laminas\Stdlib\Parameters;
use ClubeEnvios\Helper\AuthorizationHelper;
use ClubeEnvios\V1\Model\CotacaoModel;
use \ClubeEnvios\V1\Rest\Cotacao\CotacaoEntity;

class CotacaoResource extends AbstractResourceListener

{
    protected $cotacaoModel;

    public function __construct(CotacaoModel $cotacaoModel)
    {
        $this->cotacaoModel = $cotacaoModel;
    }
     
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $tokenValidationResult = AuthorizationHelper::validateAuthorizationToken();
        if ($tokenValidationResult instanceof ApiProblem) {
            return $tokenValidationResult;
        }
        $decode = ($tokenValidationResult['decoded']);
        $userid = $decode->sub;
        $cotacao = new CotacaoEntity;
        $cotacao->setIdUsuario($userid);
        $cotacao->setPeso($data->peso);
        $cotacao->setCep($data->cep);
        $cotacao = $this->cotacaoModel->fazerCotacao($cotacao);
        $result = [
            'id_cotacao' =>$cotacao->getIdCotacao(),
            'servico' => $cotacao->getServico(),
            'transportadora' => $cotacao->getTransportadora(),
            'prazo_entrega' => $cotacao->getPrazoEntrega(),
            'valor' => $cotacao->getValor(),
            'peso' => $cotacao->getPeso(),
            'cep' => $cotacao->getCep(),
        ];
        return $result;
    }

    
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array|Parameters $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    
}
