<?php


namespace App\Traits;

use App\Events\Erro\ErroEvent;
use App\Exceptions\Erro\ErroException;

trait LancaExcecao
{
    /**
     * Lanca excecao de erro com log
     *
     * @param String $message
     * @param String $status
     * @param String $messageLog
     * @throws ErroException
     */
    public function erro($message, $status, $messageLog = null)
    {
        $exception = new ErroException($message, $status, $messageLog);
        event(new ErroEvent($exception->getMensagemLog()));
        throw $exception;
    }
}
