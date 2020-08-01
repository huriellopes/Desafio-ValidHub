<?php

namespace App\Http\Controllers\Api;

use App\Enum\Erro\ErroEnum;
use App\Http\Controllers\DefaultController;
use App\Models\Cartorios;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use stdClass;

class ApiCartorioController extends DefaultController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $cartorios = $this->ICartoriosService->listCartorios();

            return response()->json([
                'status' => 200,
                'data' => $cartorios,
            ], 200);
        } catch (Exception $err) {
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400
            ], ErroEnum::STATUS_400);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function carga(Request $request)
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->AXMLC = $request->file('AXMLC');

                $file = file_get_contents($params->AXMLC);

                $this->ICartoriosService->getArquivoValidate()->validaParametros($params);

                $xml = $this->readingXML($file);

                $this->ICartoriosService->cargaXML($xml);
            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => 'Carga de cartórios via xml feita com sucesso!'
            ], 201);
        } catch(Exception $err) {
            DB::rollBack();
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400
            ], ErroEnum::STATUS_400);
        }
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->nome = $this->limpa_tags($request->input('nome'));
                $params->razao = $this->limpa_tags($request->input('razao'));
                $params->email = $this->limpa_tags($request->input('email'));
                $params->telefone = $this->limpa_tags($this->limpaMascara($request->input('telefone')));
                $params->tipo_documento = $this->limpa_tags($request->input('tipo_documento'));
                $params->documento = $this->limpa_tags($this->limpaMascara($request->input('documento')));
                $params->cep = $this->limpa_tags($this->limpaMascara($request->input('cep')));
                $params->endereco = $this->limpa_tags($request->input('endereco'));
                $params->bairro = $this->limpa_tags($request->input('bairro'));
                $params->cidade = $this->limpa_tags($request->input('cidade'));
                $params->uf = $this->limpa_tags($request->input('uf'));
                $params->tabeliao = $this->limpa_tags($request->input('tabeliao'));

                $email = $this->ICartoriosService->getCartorioByEmail($params->email);

                if (!is_null($email)) {
                    return response()->json([
                        'status' => ErroEnum::STATUS_400,
                        'message' => 'Email já existente na base de dados!'
                    ], ErroEnum::STATUS_400);
                }

                $this->ICartoriosService->createCartorio($params);
            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => 'Cartório cadastrada com sucesso!'
            ], 201);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400
            ], ErroEnum::STATUS_400);
        }
    }

    public function update(Cartorios $cartorio, Request $request)
    {
        try {
            DB::beginTransaction();
            $params = new stdClass();
            $params->nome = $this->limpa_tags($request->input('nome'));
            $params->razao = $this->limpa_tags($request->input('razao'));
            $params->email = $this->limpa_tags($request->input('email'));
            $params->telefone = $this->limpa_tags($this->limpaMascara($request->input('telefone')));
            $params->tipo_documento = $this->limpa_tags($request->input('tipo_documento'));
            $params->documento = $this->limpa_tags($this->limpaMascara($request->input('documento')));
            $params->cep = $this->limpa_tags($this->limpaMascara($request->input('cep')));
            $params->endereco = $this->limpa_tags($request->input('endereco'));
            $params->bairro = $this->limpa_tags($request->input('bairro'));
            $params->cidade = $this->limpa_tags($request->input('cidade'));
            $params->uf = $this->limpa_tags($request->input('uf'));
            $params->tabeliao = $this->limpa_tags($request->input('tabeliao'));


            $this->ICartoriosService->updateCartorio($cartorio, $params);
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Cartório atualizado com sucesso!'
            ], 200);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400
            ], ErroEnum::STATUS_400);
        }
    }

    /**
     * @param Cartorios $cartorio
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(Cartorios $cartorio)
    {
        try {
            DB::beginTransaction();
                $this->ICartoriosService->activeCartorio($cartorio);
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Cartório ativado com sucesso!'
            ], 200);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400
            ], ErroEnum::STATUS_400);
        }
    }


    /**
     * @param Cartorios $cartorio
     * @return \Illuminate\Http\JsonResponse
     */
    public function inactive(Cartorios $cartorio)
    {
        try {
            DB::beginTransaction();
                $this->ICartoriosService->inactiveCartorio($cartorio);
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Cartório inativado com sucesso!'
            ], 200);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'status' => ErroEnum::STATUS_400,
                'message' => ErroEnum::RESPOSTA_400
            ], ErroEnum::STATUS_400);
        }
    }
}
