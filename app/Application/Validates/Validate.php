<?php

namespace App\Application\Validates;

use App\Enum\Erro\ErroEnum;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Exception;

class Validate
{
    protected $rules = [];
    protected $messages = [];

    /**
     * @param stdClass $params
     * @param string $message
     * @throws Exception
     */
    public function validaParametros(stdClass $params, $message = ErroEnum::RESPOSTA_400) : void
    {
        $validator = Validator::make((array) $params, $this->getRules(), $this->getMessages());

        if ($validator->fails()) {
            throw new Exception($message, ErroEnum::STATUS_400);
        }
    }

    /**
     * Valida o inteiro
     *
     * @param int $id
     * @throws Exception
     */
    public function validaInteiro(int $id) : void
    {
        if (!is_int($id)) {
            throw new Exception('Erro ao validar o inteiro!', ErroEnum::STATUS_400);
        }
    }

    /**
     * @return array
     */
    public function getRules() : array
    {
        return $this->rules;
    }

    /**
     * @return array
     */
    public function getMessages() : array
    {
        return $this->messages;
    }
}
