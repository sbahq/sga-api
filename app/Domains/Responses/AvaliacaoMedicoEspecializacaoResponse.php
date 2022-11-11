<?php

namespace App\Domains\Responses;

use App\Domains\Services\AvaliacaoMedicoEspecializacaoService;


class AvaliacaoMedicoEspecializacaoResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new AvaliacaoMedicoEspecializacaoService();
    }

    public function getAvaliacoes($matricula){
        return $this->service->getAvaliacoes($matricula);
    }

}