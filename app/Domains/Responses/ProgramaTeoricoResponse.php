<?php

namespace App\Domains\Responses;

use App\Domains\Services\ProgramaTeoricoService;

class ProgramaTeoricoResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new ProgramaTeoricoService();
    }

    public function getProgramasTeoricos(){
        return $this->service->getProgramasTeoricos();
    }

}