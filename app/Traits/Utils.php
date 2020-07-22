<?php

namespace App\Traits;

use App\Application\Imports\CartoriosImport;
use Maatwebsite\Excel\Facades\Excel;

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
     * @param $arquivo
     * @return \SimpleXMLElement
     */
    public function getXML($arquivo)
    {
        $string = file_get_contents($arquivo);

        return simplexml_load_string($string);
    }

//    public function ExportExcel($arquivo)
//    {
//        return Excel::import(new CartoriosImport, $arquivo,'',\Maatwebsite\Excel\Excel::XLSX);
//    }
}
