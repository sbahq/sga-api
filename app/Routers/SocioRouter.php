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
        };
    }
}
