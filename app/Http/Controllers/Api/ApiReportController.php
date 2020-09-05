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
    protected $ViewReport = 'admin.components.';

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            DB::beginTransaction();
                $uf = $request->input('uf');

                $params = new stdClass();
                $params->uf = $this->limpa_tags($uf);
                $params->date_start = $this
                    ->limpa_tags($this
                        ->formatDate($request
                            ->input('date_start'), 'Y-m-d'));
                $params->date_end = $this
                    ->limpa_tags($this
                        ->formatDate($request
                            ->input('date_end'), 'Y-m-d'));

                $dados = $this->IReportService->reportBetweenDate($params);

                $pdf = $this->geraPDF($this->ViewReport.'relatorio', $dados);
            DB::commit();

            if ($pdf) {
                return $pdf->download('relatorio_cartorios_'.$uf.'_'.date('d/m/Y').'.pdf');
            } else {
                throw new Exception('Erro ao gerar o relatório!', 400);
            }

//            return response()->json([
//                'status' => 201,
//                'message' => 'Relatório gerado com sucesso!'
//            ], 200);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400,
            ], ErroEnum::STATUS_400);
        }
    }
}
