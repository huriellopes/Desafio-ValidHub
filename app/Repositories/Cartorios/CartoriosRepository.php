<?php

namespace App\Repositories\Cartorios;

use App\Interfaces\Cartorios\ICartoriosRepository;
use App\Models\Cartorios;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use stdClass;
use Exception;

class CartoriosRepository implements ICartoriosRepository
{
    /**
     * @return Collection
     */
    public function listCartorios(): Collection
    {
        return Cartorios::all();
    }

    /**
     * @param stdClass $params
     * @return Cartorios
     */
    public function createCartorio(stdClass $params): Cartorios
    {
        $cartorio = new Cartorios();
        $cartorio->nome = $params->nome;
        $cartorio->razao = $params->razao;
        $cartorio->tipo_documento = $params->tipo_documento;
        $cartorio->documento = $params->documento;
        $cartorio->cep = $params->cep;
        $cartorio->endereco = $params->endereco;
        $cartorio->bairro = $params->bairro;
        $cartorio->cidade = $params->cidade;
        $cartorio->uf = $params->uf;
        $cartorio->tabeliao = $params->tabeliao;
        $cartorio->ativo = $params->ativo || 1;
        $cartorio->user_id = Auth::user()->id;
        $cartorio->save();

        return $cartorio;
    }

    /**
     * @param Cartorios $cartorio
     * @return Cartorios
     */
    public function getCartorioById(Cartorios $cartorio): Cartorios
    {
        return $cartorio->where($cartorio->id)->first();
    }

    /**
     * @param Cartorios $cartorio
     * @param stdClass $params
     * @return Cartorios
     */
    public function updateCartorio(Cartorios $cartorio, stdClass $params): Cartorios
    {
        $cartorioId = $this->getCartorioById($cartorio);

        $cartorioId->fill([
            "razao" => $params->razao,
            "tipo_documento" => $params->tipo_documento,
            "documento" => $params->documento,
            "cep" => $params->cep,
            "endereco" => $params->endereco,
            "bairro" => $params->bairro,
            "cidade" => $params->cidade,
            "uf" => $params->uf,
            "tabeliao" => $params->tabeliao,
            "ativo" => $params->ativo,
        ]);

        $cartorioId->save();
        $cartorioId->refresh();

        return $cartorio;
    }

    /**
     * @param Cartorios $cartorio
     * @return bool
     * @throws Exception
     */
    public function deleteCartorio(Cartorios $cartorio): bool
    {
        $cartorioId = $this->getCartorioById($cartorio);

        return $cartorioId->delete();
    }
}
