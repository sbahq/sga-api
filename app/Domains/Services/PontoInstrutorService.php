<?php

namespace App\Domains\Services;

use App\Domains\Repositories\PontoInstrutorRepository;


class PontoInstrutorService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PontoInstrutorRepository();
    }

    public function getPontosInstrutor($matricula){
        return $this->repository->getPontosInstrutor($matricula);
    }

    public function savePontosInstrutor($request){
        return $this->repository->savePontosInstrutor($request);
    }

}