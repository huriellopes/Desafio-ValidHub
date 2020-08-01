<?php

namespace App\Http\Controllers\Api;

use App\Enum\Erro\ErroEnum;
use App\Http\Controllers\DefaultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use stdClass;

class ApiReportController extends DefaultController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->date_start = $this
                    ->limpa_tags($this
                        ->formatDate($request
                            ->input('date_start'), 'Y-m-d'));
                $params->date_end = $this
                    ->limpa_tags($this
                        ->formatDate($request
                            ->input('date_end'), 'Y-m-d'));

                $this->IReportService->reportBetweenDate($params);
            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => 'Relatório gerado com sucesso!'
            ], 201);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400,
            ], ErroEnum::STATUS_400);
        }
    }
}
