<?php

namespace App\Http\Controllers;

use App\Application\Interfaces\Cartorios\ICartoriosService;
use App\Application\Interfaces\TipoDocumento\ITipoDocumentoService;
use App\Traits\Utils;

class DefaultController extends Controller
{
    use Utils;

    /**
     * @var ICartoriosService
     * @var ITipoDocumentoService
     */
    protected $ICartoriosService;
    protected $ITipoDocumentoService;

    /**
     * ApiController constructor.
     * @param ICartoriosService $ICartoriosService
     * @param ITipoDocumentoService $ITipoDocumentoService
     */
    public function __construct(ICartoriosService $ICartoriosService,
                                ITipoDocumentoService $ITipoDocumentoService)
    {
        $this->ICartoriosService = $ICartoriosService;
        $this->ITipoDocumentoService = $ITipoDocumentoService;
        $this->middleware('auth');
    }
}
