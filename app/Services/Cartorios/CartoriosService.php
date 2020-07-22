<?php

namespace App\Services\Cartorios;

use App\Interfaces\Cartorios\ICartoriosRepository;
use App\Interfaces\Cartorios\ICartoriosService;
use App\Models\Cartorios;
use App\Traits\Utils;
use App\Validates\Catorios\CartoriosValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Exception;

class CartoriosService implements ICartoriosService
{
    use Utils;

    /**
     * @var ICartoriosRepository
     * @var CartoriosValidate
     */
    protected $ICartoriosRepository;
    protected $CartoriosValidate;

    /**
     * CartoriosService constructor.
     * @param ICartoriosRepository $ICartoriosRepository
     * @param CartoriosValidate $CartoriosValidate
     */
    public function __construct(ICartoriosRepository $ICartoriosRepository,
                                CartoriosValidate $CartoriosValidate)
    {
        $this->ICartoriosRepository = $ICartoriosRepository;
        $this->CartoriosValidate = $CartoriosValidate;
    }

    /**
     * @return Collection
     */
    public function listCartorios(): Collection
    {
        return $this->ICartoriosRepository->listCartorios();
    }

    /**
     * @param stdClass $params
     * @return Cartorios
     * @throws Exception
     */
    public function createCartorio(stdClass $params): Cartorios
    {
        // Valida os parâmetros recebidos
        $this->getCartoriosValidate()->validaParametros($params);

        return $this->ICartoriosRepository->createCartorio($params);
    }

    /**
     * @param Cartorios $cartorio
     * @return Cartorios
     */
    public function getCartorioById(Cartorios $cartorio): Cartorios
    {
        return $this->ICartoriosRepository->getCartorioById($cartorio);
    }

    /**
     * @param Cartorios $cartorio
     * @param stdClass $params
     * @return Cartorios
     * @throws Exception
     */
    public function updateCartorio(Cartorios $cartorio, stdClass $params): Cartorios
    {
        $this->getCartoriosValidate()->validaParametros($params);

        return $this->ICartoriosRepository->updateCartorio($cartorio, $params);
    }

    /**
     * @param Cartorios $cartorio
     * @return bool
     */
    public function deleteCartorio(Cartorios $cartorio): bool
    {
        return $this->ICartoriosRepository->deleteCartorio($cartorio);
    }

    /**
     * @return CartoriosValidate
     */
    public function getCartoriosValidate() : CartoriosValidate
    {
        return $this->CartoriosValidate;
    }
}
