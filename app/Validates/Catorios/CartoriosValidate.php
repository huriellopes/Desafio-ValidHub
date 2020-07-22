<?php

namespace App\Validates\Catorios;

use App\Validates\Validate;

class CartoriosValidate extends Validate
{
    protected $rules = [
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
}
