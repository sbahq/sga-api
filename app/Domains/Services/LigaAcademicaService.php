<?php

namespace App\Domains\Services;

use App\Domains\Repositories\LigaAcademicaRepository;

class LigaAcademicaService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new LigaAcademicaRepository();
    }

    public function getLigasAcademicas($idInstituicaoEnsino){
        return $this->repository->getLigasAcademicas($idInstituicaoEnsino);
    }

    public function getLigaAcademica($idLigaAcademica){
        return $this->repository->getLigaAcademica($idLigaAcademica);
    }

}
