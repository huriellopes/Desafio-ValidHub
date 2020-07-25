<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\DefaultController;
use App\Models\Cartorios;

class HomeController extends DefaultController
{
    private $viewPath = "admin.";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view($this->viewPath.'home.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function carga()
    {
        return view($this->viewPath.'home.carga');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $documento = $this->ITipoDocumentoService->listTipoDocumento();
        return view($this->viewPath.'home.create', compact('documento'));
    }

    /**
     * @param Cartorios $cartorio
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Cartorios $cartorio)
    {
        $cartorio = $this->ICartoriosService->getCartorioById($cartorio);
        $documento = $this->ITipoDocumentoService->listTipoDocumento();

        return view($this->viewPath.'home.show', compact('cartorio', 'documento'));
    }
}
