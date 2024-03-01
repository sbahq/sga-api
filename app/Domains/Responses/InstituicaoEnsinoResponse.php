<?php

namespace App\Domains\Responses;

use App\Domains\Services\InstituicaoEnsinoService;

class InstituicaoEnsinoResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new InstituicaoEnsinoService();
    }

    public function getInstituicoesEnsino(){
        return $this->service->getInstituicoesEnsino();
    }

    public function getInstituicaoEnsino($id){
        return $this->service->getInstituicaoEnsino($id);
    }

}