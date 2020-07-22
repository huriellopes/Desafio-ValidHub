<?php

namespace App\Interfaces\Cartorios;

use App\Models\Cartorios;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface ICartoriosService
{
    /**
     * @return Collection
     */
    public function listCartorios() : Collection;

    /**
     * @param stdClass $params
     * @return Cartorios
     */
    public function createCartorio(stdClass $params) : Cartorios;

    /**
     * @param Cartorios $cartorio
     * @return Cartorios
     */
    public function getCartorioById(Cartorios $cartorio) : Cartorios;

    /**
     * @param Cartorios $cartorio
     * @param stdClass $params
     * @return Cartorios
     */
    public function updateCartorio(Cartorios $cartorio, stdClass $params) : Cartorios;

    /**
     * @param Cartorios $cartorio
     * @return bool
     */
    public function deleteCartorio(Cartorios $cartorio) : bool;
}
