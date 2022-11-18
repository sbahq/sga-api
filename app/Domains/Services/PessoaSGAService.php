<?php

namespace App\Domains\Services;

use App\Domains\Repositories\PessoaSGARepository;


class PessoaSGAService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PessoaSGARepository();
    }

    public function getPessoaByMatricula($matricula){
        return $this->repository->getPessoaByMatricula($matricula);
    }

    public function getMembrosComissaoCET(){
        return $this->repository->getMembrosComissaoCET();
    }

}