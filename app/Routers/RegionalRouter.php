<?php

namespace App\Routers;

use App\Http\Controllers\RegionalController;
use Illuminate\Support\Facades\Route;

class RegionalRouter
{

    public static function instance()
    {
        return new RegionalRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('', [RegionalController::class, 'getRegionais']);
            Route::get('{id}', [RegionalController::class, 'getRegional']);
        };
    }
}
