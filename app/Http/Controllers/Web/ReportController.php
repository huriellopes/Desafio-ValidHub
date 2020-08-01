<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $viewPath = "admin.report.";

    public function index()
    {
        return view($this->viewPath.'index');
    }
}
