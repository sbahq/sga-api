<?php

namespace App\Domains\Services;

use App\Domains\Repositories\ProgramaTeoricoRepository;


class ProgramaTeoricoService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ProgramaTeoricoRepository();
    }

    public function getProgramasTeoricos(){
        return $this->repository->getProgramasTeoricos();
    }

}