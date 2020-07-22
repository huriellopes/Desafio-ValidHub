<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Interfaces\Cartorios\ICartoriosService;
use App\Traits\Utils;

class ApiController extends Controller
{
    use Utils;

    protected $ICartoriosService;

    public function __construct(ICartoriosService $ICartoriosService)
    {
        $this->ICartoriosService = $ICartoriosService;
        $this->middleware('auth');
    }
}
