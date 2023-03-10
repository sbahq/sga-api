<?php

namespace App\Domains\Responses;

use App\Domains\Services\PontoInstrutorService;

class PontoInstrutorResponse
{

    private $service;

    public function __construct()
    {
        $this->service = new PontoInstrutorService();
    }

    public function getPontosInstrutor($matricula){
        return $this->service->getPontosInstrutor($matricula);
    }

}