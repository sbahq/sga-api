<?php

namespace App\Routers;

use App\Http\Controllers\LigaAcademicaController;
use Illuminate\Support\Facades\Route;

class LigaAcademicaRouter
{

    public static function instance()
    {
        return new LigaAcademicaRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('{idInstituicaoEnsino}', [LigaAcademicaController::class, 'getLigasAcademicas']);
            Route::get('liga/{idLigaAcademica}', [LigaAcademicaController::class, 'getLigaAcademica']);
        };
    }
}
