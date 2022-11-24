<?php

namespace App\Routers;

use App\Http\Controllers\DadosAnestesicosController;
use Illuminate\Support\Facades\Route;

class DadosAnestesicosRouter
{

    public static function instance()
    {
        return new DadosAnestesicosRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('/get-periodo-me/{matricula}', [DadosAnestesicosController::class, 'getPeriodoME']);
            Route::post('/get-periodo-indicador', [DadosAnestesicosController::class, 'getDadosIndicadorME']);
        };
    }
}
