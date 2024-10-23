<?php
namespace ClubeEnvios\V1\Rest\CotacaoServicos;
use ClubeEnvios\V1\Model\CotacaoModel;

class CotacaoServicosResourceFactory
{
    public function __invoke($services)
    {
        $dbAdapter = $services->get('Database'); 
        $cotacaoModel = new CotacaoModel($dbAdapter);
        return new CotacaoServicosResource($cotacaoModel);
    }
}
