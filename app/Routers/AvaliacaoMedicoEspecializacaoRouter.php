<?php

namespace App\Routers;

use App\Http\Controllers\AvaliacaoMedicoEspecializacaoController;
use Illuminate\Support\Facades\Route;

class AvaliacaoMedicoEspecializacaoRouter
{

    public static function instance()
    {
        return new AvaliacaoMedicoEspecializacaoRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::post('/get-avaliacoes', [AvaliacaoMedicoEspecializacaoController::class, 'getAvaliacoes']);
        };
    }
}
