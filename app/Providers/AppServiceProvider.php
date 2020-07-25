<?php

namespace App\Providers;

use App\Application\Interfaces\Cartorios\ICartoriosRepository;
use App\Application\Interfaces\Cartorios\ICartoriosService;
use App\Application\Interfaces\TipoDocumento\ITipoDocumentoRepository;
use App\Application\Interfaces\TipoDocumento\ITipoDocumentoService;
use App\Application\Repositories\Cartorios\CartoriosRepository;
use App\Application\Repositories\TipoDocumento\TipoDocumentoRepository;
use App\Application\Services\Cartorios\CartoriosService;
use App\Application\Services\TipoDocumento\TipoDocumentoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Cartorios
        $this->app->singleton(
            ICartoriosService::class,
            CartoriosService::class
        );

        $this->app->singleton(
            ICartoriosRepository::class,
            CartoriosRepository::class
        );

        // Tipo Documento
        $this->app->singleton(
            ITipoDocumentoService::class,
            TipoDocumentoService::class
        );

        $this->app->singleton(
            ITipoDocumentoRepository::class,
            TipoDocumentoRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
