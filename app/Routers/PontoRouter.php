<?php

namespace App\Routers;

use App\Http\Controllers\PontoController;
use Illuminate\Support\Facades\Route;

class PontoRouter
{

    public static function instance()
    {
        return new PontoRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('/get-pontos', [PontoController::class, 'getPontos']);
        };
    }
}
