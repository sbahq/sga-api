<?php

namespace App\Routers;

use App\Http\Controllers\PontoInstrutorController;
use Illuminate\Support\Facades\Route;

class PontoInstrutorRouter
{

    public static function instance()
    {
        return new PontoInstrutorRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('/get-pontos-instrutores/{matricula}', [PontoInstrutorController::class, 'getPontosInstrutor']);
        };
    }
}
