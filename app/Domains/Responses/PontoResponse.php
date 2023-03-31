<?php

namespace App\Domains\Responses;

use App\Domains\Services\PontoService;

class PontoResponse
{

    private $service;

    public function __construct()
    {
        $this->service = new PontoService();
    }

    public function getPontos(){
        return $this->service->getPontos();
    }

    public function getPontosMatricula($matricula){
        return $this->service->getPontosMatricula($matricula);
    }

}