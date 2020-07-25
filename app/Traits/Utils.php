<?php

namespace App\Traits;

use SimpleXMLElement;

trait Utils
{
    /**
     * Função para limpar scripts
     *
     * @param $variavel
     * @return string|string[]|null
     */
    public function limpa_tags($variavel)
    {
        return preg_replace('(<(/?[^\>]+)>)', '', $variavel);
    }

    /**
     * Função para limpar Mascara
     *
     * @param $variavel
     * @return string|string[]|null
     */
    public function limpaMascara($variavel)
    {
        return preg_replace('/\D+/', '', $variavel);
    }

    /**
     * Função para ler arquivo XML
     *
     * @param $arquivo
     * @return SimpleXMLElement
     */
    public function readingXML($arquivo)
    {
        return simplexml_load_string($arquivo);
    }
}
