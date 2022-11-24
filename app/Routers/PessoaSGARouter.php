<?php

namespace App\Routers;

use App\Http\Controllers\PessoaSGAController;
use Illuminate\Support\Facades\Route;

class PessoaSGARouter
{

    public static function instance()
    {
        return new PessoaSGARouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('/get-pessoa/{matricula}', [PessoaSGAController::class, 'getPessoaByMatricula']);
            Route::get('/membros-comissao-cet', [PessoaSGAController::class, 'getMembrosComissaoCET']);
            Route::get('/presidente-comissao-cet', [PessoaSGAController::class, 'getPresidenteComissaoCET']);
        };
    }
}
