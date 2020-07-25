<?php


namespace App\Exceptions\Erro;

use Exception;

class ErroException extends Exception
{
    public $mensagem;
    public $status;
    private $mensagemLog;

    public function __construct($mensagem, $status, $mensagemLog)
    {
        $this->mensagemLog = $mensagemLog;
        parent::__construct($mensagem, $status);
    }

    /**
     * @return mixed
     */
    public function getMensagemLog()
    {
        return $this->mensagemLog;
    }
}