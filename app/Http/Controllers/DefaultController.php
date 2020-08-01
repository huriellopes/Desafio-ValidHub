<?php

namespace App\Http\Controllers;

use App\Application\Interfaces\Cartorios\ICartoriosService;
use App\Application\Interfaces\Report\IReportService;
use App\Application\Interfaces\TipoDocumento\ITipoDocumentoService;
use App\Traits\Utils;

class DefaultController extends Controller
{
    use Utils;

    /**
     * @var ICartoriosService
     * @var ITipoDocumentoService
     * @var IReportService
     */
    protected $ICartoriosService;
    protected $ITipoDocumentoService;
    protected $IReportService;

    /**
     * ApiController constructor.
     * @param ICartoriosService $ICartoriosService
     * @param ITipoDocumentoService $ITipoDocumentoService
     * @param IReportService $IReportService
     */
    public function __construct(ICartoriosService $ICartoriosService,
                                ITipoDocumentoService $ITipoDocumentoService,
                                IReportService $IReportService)
    {
        $this->ICartoriosService = $ICartoriosService;
        $this->ITipoDocumentoService = $ITipoDocumentoService;
        $this->IReportService = $IReportService;
        $this->middleware('auth');
    }
}
