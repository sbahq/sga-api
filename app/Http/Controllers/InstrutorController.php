<?php

namespace App\Http\Controllers;

use App\Domains\Services\InstrutorService;
use App\Domains\Responses\InstrutorResponse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstrutorController extends Controller
{
    public function __construct()
    {
        $this->service = new InstrutorService();
        $this->response = new InstrutorResponse();
    }

    public function getInstrutores(){
        return $this->service->getInstrutores();
    }

    public function getInstrutoresPontoTalento($ponto){
        return $this->response->getInstrutoresPontoTalento($ponto);
    }

    public function getInstrutoresCet($matriculaCET){
        return $this->response->getInstrutoresCet($matriculaCET);
    }

    public function getInstrutoresCETComTSA($matriculaCET){
        return $this->response->getInstrutoresCETComTSA($matriculaCET);
    }

    public function getInstrutoresComTSA(){
        return $this->response->getInstrutoresComTSA();
    }

    public function getInstrutor($matricula){
        return $this->response->getInstrutor($matricula);
    }

    public function getInstrutoresRegularesCET($matriculaCET){
        return $this->response->getInstrutoresRegularesCET($matriculaCET);
    }

    public function getTotalInstrutoresCETById($cetID){
        return $this->response->getTotalInstrutoresCETById($cetID);
    }

    public function getResponsaveisCET(){
        return $this->response->getResponsaveisCET();
    }

    public function getInstrutoresComPendencias($matriculaCET, $daysToExpiration){
        return $this->response->getInstrutoresComPendencias($matriculaCET, $daysToExpiration);
    }

}
