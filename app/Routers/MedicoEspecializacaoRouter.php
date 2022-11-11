<?php

namespace App\Routers;

use App\Http\Controllers\MedicoEspecializacaoController;
use Illuminate\Support\Facades\Route;

class MedicoEspecializacaoRouter
{

    public static function instance()
    {
        return new MedicoEspecializacaoRouter();
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('/{matricula_cet}', [MedicoEspecializacaoController::class, 'getMedicosEspecializacaoCET']);
            Route::get('/finalizado-periodo-me/{matricula_cet}', [MedicoEspecializacaoController::class, 'getMedicosEspecializacaoFinalizadoPeriodoME']);
            Route::post('/finalizado-periodo-me', [MedicoEspecializacaoController::class, 'getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome']);
            Route::get('', [MedicoEspecializacaoController::class, 'getMedicosEspecializacao']);
            Route::get('/medicos-especializacao-com-pendencias/{matricula_cet}/{days_to_expiration}', [MedicoEspecializacaoController::class, 'getMedicosEspecializacaoComPendencias']);
            Route::post('/get-medico', [MedicoEspecializacaoController::class, 'getMedicoEspecializacao']);
            
        };
    }
}
