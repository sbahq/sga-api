<?php

namespace App\Routers;

use App\Http\Controllers\SocioController;
use Illuminate\Support\Facades\Route;

class SocioRouter
{

    public static function instance()
    {
        return new SocioRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('', [SocioController::class, 'getAllSociosEmDia']);
            Route::get('cpf/{cpf}', [SocioController::class, 'getAssociadoCPF']);
            Route::get('cpf/status/{cpf}', [SocioController::class, 'getAssociadoCPFStatus']);
            Route::get('pessoa/cpf/{cpf}', [SocioController::class, 'getPessoaCPF']);
            Route::get('secret3/cpf/{cpf}', [SocioController::class, 'getPessoaSecret3CPF']);
            Route::get('email/{email}', [SocioController::class, 'getAssociadoEmail']);
        };
    }
}
