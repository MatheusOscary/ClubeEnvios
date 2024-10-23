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

    public function create($data)
    {
        $tokenValidationResult = AuthorizationHelper::validateAuthorizationToken();
        if ($tokenValidationResult instanceof ApiProblem) {
            return $tokenValidationResult;
        }

        $decode = ($tokenValidationResult['decoded']);
        $userid = $decode->sub;

        if (empty($userid)) {
            return new ApiProblem(401, 'Usuário não autorizado.');
        }

        if (empty($data->peso) || empty($data->cep)) {
            return new ApiProblem(400, 'Dados incompletos: peso e cep são obrigatórios.');
        }

        if (!is_numeric($data->peso) || $data->peso <= 0) {
            return new ApiProblem(422, 'Peso inválido.');
        }

        $cotacao = new CotacaoEntity;
        $cotacao->setIdUsuario($userid);
        $cotacao->setPeso($data->peso);
        $cotacao->setCep($data->cep);

        $cotacao = $this->cotacaoModel->fazerCotacao($cotacao);
        if (empty($cotacao->getIdCotacao())) {
            return new ApiProblem(404, 'Não foi possível cotar um frete.');
        }

        $result = [
            'id_cotacao' => $cotacao->getIdCotacao(),
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
        if (empty($id) || !is_numeric($id)) {
            return new ApiProblem(400, 'ID inválido ou ausente.');
        }

        $tokenValidationResult = AuthorizationHelper::validateAuthorizationToken();
        if ($tokenValidationResult instanceof ApiProblem) {
            return $tokenValidationResult;
        }

        $decode = ($tokenValidationResult['decoded']);
        $userid = $decode->sub;

        if (empty($userid)) {
            return new ApiProblem(401, 'Usuário não autorizado.');
        }

        $row = $this->cotacaoModel->SelectId($id, $userid);

        if (empty($row)) {
            return new ApiProblem(404, 'Registro não encontrado para o ID especificado.');
        }

        return $row;
    }

    public function fetchAll($params = [])
    {
        $tokenValidationResult = AuthorizationHelper::validateAuthorizationToken();
        if ($tokenValidationResult instanceof ApiProblem) {
            return $tokenValidationResult;
        }

        $decode = ($tokenValidationResult['decoded']);
        $userid = $decode->sub;

        if (empty($userid)) {
            return new ApiProblem(401, 'Usuário não autorizado.');
        }

        $result = $this->cotacaoModel->Select($userid);

        if (empty($result)) {
            return new ApiProblem(404, 'Nenhuma cotação encontrada.');
        }

        $cotacoes = [];
        foreach ($result as $row) {
            $cotacoes[] = $row;
        }

        if (empty($cotacoes)) {
            return new ApiProblem(204, 'Nenhuma cotação disponível.');
        }

        return $cotacoes;
    }
}
