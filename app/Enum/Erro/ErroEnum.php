<?php


namespace App\Enum\Erro;


class ErroEnum
{
    //Visões
    const VIEW_404 = 'error-404';

    //Mensagens
    const RESPOSTA_400 = 'Erro';
    const RESPOSTA_401 = 'Não autorizado.';
    const RESPOSTA_403 = 'Sem permissão de acesso.';
    const RESPOSTA_404 = 'O servidor não pôde encontrar o recurso solicitado.';
    const RESPOSTA_500 = 'Erro do servidor ao processar a solicitação.';

    //Status
    const STATUS_400 = 400;
    const STATUS_401 = 401;
    const STATUS_403 = 403;
    const STATUS_404 = 404;
    const STATUS_500 = 500;
}