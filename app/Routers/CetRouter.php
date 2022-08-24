<?php

namespace App\Routers;

use App\Http\Controllers\CetController;
use Illuminate\Support\Facades\Route;

class CetRouter
{

    public static function instance()
    {
        return new CetRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('', [CetController::class, 'getCets']);
            Route::get('{id}', [CetController::class, 'getCet']);
        };
    }
}
