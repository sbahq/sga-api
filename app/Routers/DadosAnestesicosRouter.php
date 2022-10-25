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
            Route::get('/get-dados-logbook/{matricula}', [DadosAnestesicosController::class, 'getDadosLogbook']);
        };
    }
}