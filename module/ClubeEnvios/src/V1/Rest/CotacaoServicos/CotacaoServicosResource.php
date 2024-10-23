<?php
namespace ClubeEnvios\V1\Rest\CotacaoServicos;
use ClubeEnvios\V1\Model\CotacaoModel;
use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;
use Laminas\Stdlib\Parameters;
use \Laminas\View\Model\JsonModel;

class CotacaoServicosResource extends AbstractResourceListener
{

    protected $cotacaoModel;

    public function __construct(CotacaoModel $cotacaoModel)
    {
        $this->cotacaoModel = $cotacaoModel;
    }
    /**
     * Fetch all or a subset of resources
     *
     * @param  array|Parameters $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $servicos = $this->cotacaoModel->SelectServico();
        
        $servicosArray = [];

        foreach ($servicos as $servico) {
            $servicosArray[] = [
                'id' => $servico->getIdServico(),
                'nome' => $servico->getNmServico(),
                'transportadora' => [
                    'id' => $servico->getIdTransportadora(),
                    'nome' => $servico->getNmTransportadora()
                    ]
                ];
            }
            
        return $servicosArray;
    }


    
}
