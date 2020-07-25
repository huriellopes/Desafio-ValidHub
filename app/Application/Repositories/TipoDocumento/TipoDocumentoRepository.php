<?php

namespace App\Application\Repositories\TipoDocumento;

use App\Application\Interfaces\TipoDocumento\ITipoDocumentoRepository;
use App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Collection;

class TipoDocumentoRepository implements ITipoDocumentoRepository
{
    /**
     * @return Collection
     */
    public function listTipoDocumento() : Collection
    {
        return TipoDocumento::all();
    }
}
