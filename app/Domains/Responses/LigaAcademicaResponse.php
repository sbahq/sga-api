<?php

namespace App\Domains\Responses;

use App\Domains\Services\LigaAcademicaService;

class LigaAcademicaResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new LigaAcademicaService();
    }

    public function getLigasAcademicas($idInstituicaoEnsino){
        return $this->service->getLigasAcademicas($idInstituicaoEnsino);
    }

    public function getLigaAcademica($id){
        return $this->service->getLigaAcademica($id);
    }

}