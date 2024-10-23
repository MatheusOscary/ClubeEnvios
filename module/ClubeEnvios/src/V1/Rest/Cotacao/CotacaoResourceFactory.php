<?php
namespace ClubeEnvios\V1\Rest\Cotacao;
use ClubeEnvios\V1\Model\CotacaoModel;

class CotacaoResourceFactory
{
    public function __invoke($services)
    {
        $dbAdapter = $services->get('Database'); 
        $cotacaoModel = new CotacaoModel($dbAdapter);
        return new CotacaoResource($cotacaoModel);
    }
}
