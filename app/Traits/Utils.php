<?php

namespace App\Traits;

use PDF;
use Carbon\Carbon;
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
     * @param $date
     * @param $format
     * @return string
     */
    public function formatDate($date, $format)
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format($format);
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

    public function geraPDF($view, $dados)
    {
        $pdf = PDF::loadView($view, compact('dados'));
        return $pdf
            ->setPaper('a4', 'landscape')
            ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    }
}
