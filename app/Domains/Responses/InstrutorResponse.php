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

}