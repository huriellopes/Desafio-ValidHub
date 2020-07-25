<?php

namespace App\Application\Repositories\Cartorios;

use App\Application\Interfaces\Cartorios\ICartoriosRepository;
use App\Models\Cartorios;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use stdClass;
use Exception;
use SimpleXMLElement;

class CartoriosRepository implements ICartoriosRepository
{
    /**
     * @return Collection
     */
    public function listCartorios(): Collection
    {
        return Cartorios::with('tipo_documento')->orderBy('id')->get();
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
        $cartorio->email = $params->email;
        $cartorio->telefone = $params->telefone;
        $cartorio->tipo_documento = $params->tipo_documento;
        $cartorio->documento = $params->documento;
        $cartorio->cep = $params->cep;
        $cartorio->endereco = $params->endereco;
        $cartorio->bairro = $params->bairro;
        $cartorio->cidade = $params->cidade;
        $cartorio->uf = $params->uf;
        $cartorio->tabeliao = $params->tabeliao;
        $cartorio->ativo = 1;
        $cartorio->user_id = Auth::user()->id;
        $cartorio->save();

        return $cartorio;
    }

    public function cargaXML(SimpleXMLElement $params) : Cartorios
    {
        $cartorios = new Cartorios();
        $cartorios->nome = $params->nome;
        $cartorios->razao = $params->razao;
        $cartorios->email = $params->email;
        $cartorios->telefone = $params->telefone;
        $cartorios->tipo_documento = (int) $params->tipo_documento;
        $cartorios->documento = $params->documento;
        $cartorios->cep = $params->cep;
        $cartorios->endereco = $params->endereco;
        $cartorios->bairro = $params->bairro;
        $cartorios->cidade = $params->cidade;
        $cartorios->uf = $params->uf;
        $cartorios->tabeliao = $params->tabeliao;
        $cartorios->ativo = $params->ativo;
        $cartorios->user_id = Auth::user()->id;
        $cartorios->save();

        return $cartorios;
    }

    /**
     * @param Cartorios $cartorio
     * @return Cartorios|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getCartorioById(Cartorios $cartorio): Cartorios
    {
        return Cartorios::with('tipo_documento')->where('id', '=', $cartorio->id)->first();
    }

    /**
     * @param string $email
     * @return Cartorios|null
     */
    public function getCartorioByEmail(string $email): ?Cartorios
    {
        return Cartorios::where('email', '=', $email)->first();
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
            "nome" => $params->nome,
            "razao" => $params->razao,
            "email" => $params->email,
            "telefone" => $params->telefone,
            "tipo_documento" => $params->tipo_documento,
            "documento" => $params->documento,
            "cep" => $params->cep,
            "endereco" => $params->endereco,
            "bairro" => $params->bairro,
            "cidade" => $params->cidade,
            "uf" => $params->uf,
            "tabeliao" => $params->tabeliao
        ]);

        $cartorioId->save();
        $cartorioId->refresh();

        return $cartorio;
    }

    /**
     * @param Cartorios $cartorio
     * @return Cartorios
     */
    public function activeCartorio(Cartorios $cartorio) : Cartorios
    {
        $cartorioActive = $this->getCartorioById($cartorio);

        $cartorioActive->fill([
            "ativo" => 1,
        ]);

        $cartorioActive->save();
        $cartorioActive->refresh();

        return $cartorio;
    }

    /**
     * @param Cartorios $cartorio
     * @return Cartorios
     */
    public function inactiveCartorio(Cartorios $cartorio) : Cartorios
    {
        $cartorioInactive = $this->getCartorioById($cartorio);

        $cartorioInactive->fill([
            "ativo" => 0,
        ]);

        $cartorioInactive->save();
        $cartorioInactive->refresh();

        return $cartorio;
    }
}
