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

    public function getInstrutoresCETComTSA($matriculaCET){
        return $this->response->getInstrutoresCETComTSA($matriculaCET);
    }

    public function router($router)
    {
        return function ($router) {
            Route::get('', [InstrutorController::class, 'getInstrutores']);
            Route::get('/get-instrutor/{matricula}', [InstrutorController::class, 'getInstrutor']);
            Route::get('/get-instrutores-cet/{matricula_cet}', [InstrutorController::class, 'getInstrutoresCet']);
            Route::get('/get-instrutores-cet-com-tsa/{matricula_cet}', [InstrutorController::class, 'getInstrutoresCETComTSA']);
            Route::get('/get-instrutores-regulares-cet/{matricula_cet}', [InstrutorController::class, 'getInstrutoresRegularesCET']);            
            Route::get('/total-instrutores-regularizados-id/{cet_id}', [InstrutorController::class, 'getTotalInstrutoresCETById']);
            Route::get('/responsaveis-cet', [InstrutorController::class, 'getResponsaveisCET']);
            Route::get('/instrutores-com-pendencias/{matricula_cet}/{days_to_expiration}', [InstrutorController::class, 'getInstrutoresComPendencias']);
            Route::get('/instrutores-com-pendencias-tsa/{matricula_cet}/{days_to_expiration}', [InstrutorController::class, 'getInstrutoresComPendenciasComTSA']);
        };
    }
}
