<?php

namespace App\Routers;

use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Route;

class VagaRouter
{

    public static function instance()
    {
        return new VagaRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('dados-vaga/{matricula_cet}', [VagaController::class, 'dadosVaga']);
        };
    }

}