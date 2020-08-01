<?php

namespace App\Application\Validates\Catorios;

use App\Application\Validates\Validate;
use App\Enum\Erro\ErroEnum;
use Illuminate\Support\Facades\Validator;
use Exception;

class CartoriosValidate extends Validate
{
    protected $rules = [
        'nome' => 'required|string',
        'razao' => 'required|string',
        'tipo_documento' => 'required|integer',
        'documento' => 'required|string',
        'cep' => 'required|string',
        'endereco' => 'required|string',
        'bairro' => 'required|string',
        'cidade' => 'required|string',
        'uf' => 'required|string',
        'telefone' => 'required|string',
        'email' => 'required|string|email',
        'tabeliao' => 'required|string',
    ];

    protected $rulesCarga = [
        'nome' => 'string',
        'razao' => 'string',
        'tipo_documento' => 'string',
        'documento' => 'string',
        'cep' => 'string',
        'endereco' => 'string',
        'bairro' => 'string',
        'cidade' => 'string',
        'uf' => 'string',
        'tabeliao' => 'string',
        'ativo' => 'string',
    ];

    protected $messages = [];

    public function ValidaCarga(array $params, $message = ErroEnum::RESPOSTA_400): void
    {
        $validator = Validator::make($params, $this->getRulesCarga(), $this->getMessages());

        if ($validator->fails()) {
            throw new Exception($message, ErroEnum::STATUS_400);
        }
    }

    /**
     * @return array|string[]
     */
    public function getRulesCarga(): array
    {
        return $this->rulesCarga;
    }
}
