<?php

namespace App\Application\Interfaces\TipoDocumento;

use Illuminate\Database\Eloquent\Collection;

interface ITipoDocumentoService
{
    /**
     * @return Collection
     */
    public function listTipoDocumento() : Collection;
}
