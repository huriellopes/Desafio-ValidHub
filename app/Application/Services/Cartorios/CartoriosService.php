<?php

namespace App\Application\Services\Cartorios;

use App\Application\Interfaces\Cartorios\ICartoriosRepository;
use App\Application\Interfaces\Cartorios\ICartoriosService;
use App\Application\Validates\Arquivos\FileValidate;
use App\Models\Cartorios;
use App\Traits\Utils;
use App\Application\Validates\Catorios\CartoriosValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Exception;
use SimpleXMLElement;

class CartoriosService implements ICartoriosService
{
    use Utils;

    /**
     * @var ICartoriosRepository
     * @var CartoriosValidate
     * @var FileValidate
     */
    protected $ICartoriosRepository;
    protected $CartoriosValidate;
    protected $FileValidate;

    /**
     * CartoriosService constructor.
     * @param ICartoriosRepository $ICartoriosRepository
     * @param CartoriosValidate $CartoriosValidate
     * @param FileValidate $FileValidate
     */
    public function __construct(ICartoriosRepository $ICartoriosRepository,
                                CartoriosValidate $CartoriosValidate,
                                FileValidate $FileValidate)
    {
        $this->ICartoriosRepository = $ICartoriosRepository;
        $this->CartoriosValidate = $CartoriosValidate;
        $this->FileValidate = $FileValidate;
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
     * @param string $email
     * @return Cartorios|null
     */
    public function getCartorioByEmail(string $email): ?Cartorios
    {
        return $this->ICartoriosRepository->getCartorioByEmail($email);
    }

    /**
     * @param SimpleXMLElement $params
     * @return Cartorios
     * @throws Exception
     */
    public function cargaXML(SimpleXMLElement $params) : Cartorios
    {
        // Valida os parâmetros recebidos
        $this->getCartoriosValidate()->ValidaCarga((array) $params);

        foreach ($params as $cartorioXML) {
            $cartorio = $this->ICartoriosRepository->cargaXML($cartorioXML);
        }

        return $cartorio;
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
     * @return Cartorios
     * @throws Exception
     */
    public function activeCartorio(Cartorios $cartorio) : Cartorios
    {
        $this->getCartoriosValidate()->validaInteiro($cartorio->id);

        return $this->ICartoriosRepository->activeCartorio($cartorio);
    }

    /**
     * @param Cartorios $cartorio
     * @return Cartorios
     * @throws Exception
     */
    public function inactiveCartorio(Cartorios $cartorio) : Cartorios
    {
        $this->getCartoriosValidate()->validaInteiro($cartorio->id);

        return $this->ICartoriosRepository->inactiveCartorio($cartorio);
    }

    /**
     * @return CartoriosValidate
     */
    public function getCartoriosValidate() : CartoriosValidate
    {
        return $this->CartoriosValidate;
    }

    /**
     * @return FileValidate
     */
    public function getArquivoValidate() : FileValidate
    {
        return $this->FileValidate;
    }
}
