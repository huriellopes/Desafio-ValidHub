<?php

namespace App\Application\Services\TipoDocumento;

use App\Application\Interfaces\TipoDocumento\ITipoDocumentoRepository;
use App\Application\Interfaces\TipoDocumento\ITipoDocumentoService;
use Illuminate\Database\Eloquent\Collection;

class TipoDocumentoService implements ITipoDocumentoService
{
    protected $ITipoDocumentoRepository;

    public function __construct(ITipoDocumentoRepository $ITipoDocumentoRepository)
    {
        $this->ITipoDocumentoRepository = $ITipoDocumentoRepository;
    }

    /**
     * @return Collection
     */
    public function listTipoDocumento() : Collection
    {
        return $this->ITipoDocumentoRepository->listTipoDocumento();
    }
}
