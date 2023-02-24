<?php

namespace App\Domains\Responses;

use App\Domains\Services\NivelProgramaTeoricoService;

class NivelProgramaTeoricoResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new NivelProgramaTeoricoService();
    }

    public function getNiveisProgramasTeoricos(){
        return $this->service->getNiveisProgramasTeoricos();
    }

}