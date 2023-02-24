<?php

namespace App\Routers;

use App\Http\Controllers\NivelProgramaTeoricoController;
use Illuminate\Support\Facades\Route;

class NivelProgramaTeoricoRouter
{

    public static function instance()
    {
        return new NivelProgramaTeoricoRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('/get-nivel-programa-teorico', [NivelProgramaTeoricoController::class, 'getNiveisProgramasTeoricos']);
        };
    }
}
