<?php

namespace App\Routers;

use App\Http\Controllers\HospitalMECController;
use Illuminate\Support\Facades\Route;

class HospitalMECRouter
{

    public static function instance()
    {
        return new HospitalMECRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('', [HospitalMECController::class, 'getHospitais']);
            Route::get('{id}', [HospitalMECController::class, 'getHospital']);
        };
    }
}
