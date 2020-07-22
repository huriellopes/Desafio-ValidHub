<?php

namespace App\Providers;

use App\Interfaces\Cartorios\ICartoriosRepository;
use App\Interfaces\Cartorios\ICartoriosService;
use App\Repositories\Cartorios\CartoriosRepository;
use App\Services\Cartorios\CartoriosService;
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
