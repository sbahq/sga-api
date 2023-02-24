<?php

namespace App\Domains\Services;

use App\Domains\Repositories\NivelProgramaTeoricoRepository;


class NivelProgramaTeoricoService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new NivelProgramaTeoricoRepository();
    }

    public function getNiveisProgramasTeoricos(){
        return $this->repository->getNiveisProgramasTeoricos();
    }

}