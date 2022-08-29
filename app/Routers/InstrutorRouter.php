<?php

namespace App\Routers;

use App\Http\Controllers\InstrutorController;
use Illuminate\Support\Facades\Route;

class InstrutorRouter
{

    public static function instance()
    {
        return new InstrutorRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('', [InstrutorController::class, 'getInstrutores']);
            Route::get('{matricula_cet}', [InstrutorController::class, 'getInstrutoresCet']);

        };
    }
}
