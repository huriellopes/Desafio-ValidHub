<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class ApiCartorioController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        try {
            $cartorios = $this->ICartoriosService->listCartorios();

            return response()->json($cartorios, 200);
        } catch (Exception $err) {
            return response()->json([
                'message' => 'Erro ao listar os cartórios!'
            ], 400);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            $params = new stdClass();
            $params->AXMLC = $this->limpa_tags($request->file('AXMLC'));

            $excel = $this->getXML($params->AXMLC);

            dd($excel);
            DB::commit();
        } catch(Exception $err) {
            DB::rollBack();
            return response()->json([
                'message' => 'Erro ao cadastrar os cartórios!'
            ], 400);
        }
    }
}
