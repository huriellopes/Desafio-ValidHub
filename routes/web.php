<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([
    'prefix' => '/admin'
], function () {
    Route::get('/home', 'Web\HomeController@index')
        ->name('home');
    Route::get('/carga', 'Web\HomeController@carga')
        ->name('carga/xml');
    Route::get('/create', 'Web\HomeController@create')
        ->name('cartorio/create');
    Route::get('/show/{cartorio}', 'Web\HomeController@show')
        ->name('cartorio/show');

    Route::group([
        'prefix' => '/api'
    ], function () {
        Route::get('/cartorios', 'Api\ApiCartorioController@index')
            ->name('cartorio/list');
        Route::post('/carga', 'Api\ApiCartorioController@carga')
            ->name('cartorio.carga');
        Route::post('/create', 'Api\ApiCartorioController@create')
            ->name('cartorio.create');
        Route::post('/update/{cartorio}', 'Api\ApiCartorioController@update')
            ->name('cartorio.update');
        Route::post('/active/{cartorio}', 'Api\ApiCartorioController@active')
            ->name('cartorio.active');
        Route::post('/inactive/{cartorio}', 'Api\ApiCartorioController@inactive')
            ->name('cartorio.inactive');
    });
});
