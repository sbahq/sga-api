<?php

namespace App\Routers;

use App\Http\Controllers\ProgramaTeoricoController;
use Illuminate\Support\Facades\Route;

class ProgramaTeoricoRouter
{

    public static function instance()
    {
        return new ProgramaTeoricoRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('/get-programas-teoricos', [ProgramaTeoricoController::class, 'getProgramasTeoricos']);
        };
    }
}
