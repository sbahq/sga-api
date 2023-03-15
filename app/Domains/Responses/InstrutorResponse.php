<?php

namespace App\Domains\Responses;

use App\Domains\Services\InstrutorService;

class InstrutorResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new InstrutorService();
    }

    public function getInstrutoresCet($matriculaCET){
        return $this->service->getInstrutoresCet($matriculaCET);
    }

    public function getInstrutoresPontoTalento($ponto){
        return $this->service->getInstrutoresPontoTalento($ponto);
    }

    public function getInstrutoresCETComTSA($matriculaCET){
        return $this->service->getInstrutoresCETComTSA($matriculaCET);
    }

    public function getInstrutoresComTSA(){
        return $this->service->getInstrutoresComTSA();
    }

    public function getInstrutor($matricula){
        return $this->service->getInstrutor($matricula);
    }

    public function getInstrutoresRegularesCET($matriculaCET){
        return $this->service->getInstrutoresRegularesCET($matriculaCET);
    }

    public function getTotalInstrutoresCETById($cetID){
        return $this->service->getTotalInstrutoresCETById($cetID);
    }

    public function getResponsaveisCET(){
        return $this->service->getResponsaveisCET();
    }

    public function getInstrutoresComPendencias($matriculaCET, $daysToExpiration){
        return $this->service->getInstrutoresComPendencias($matriculaCET, $daysToExpiration);
    }

    public function getInstrutoresComPendenciasComTSA($matriculaCET, $daysToExpiration){
        return $this->service->getInstrutoresComPendenciasComTSA($matriculaCET, $daysToExpiration);
    }

}