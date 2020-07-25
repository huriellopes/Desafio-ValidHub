<?php

namespace App\Application\Interfaces\TipoDocumento;

use Illuminate\Database\Eloquent\Collection;

interface ITipoDocumentoRepository
{
    /**
     * @return Collection
     */
    public function listTipoDocumento() : Collection;
}
