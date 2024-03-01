<?php

namespace App\Routers;

use App\Http\Controllers\InstituicaoEnsinoController;
use Illuminate\Support\Facades\Route;

class InstituicaoEnsinoRouter
{

    public static function instance()
    {
        return new InstituicaoEnsinoRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('', [InstituicaoEnsinoController::class, 'getInstituicoesEnsino']);
            Route::get('{id}', [InstituicaoEnsinoController::class, 'getInstituicaoEnsino']);
        };
    }
}
