<?php

namespace App\Domains\Services;

use App\Domains\Repositories\InstituicaoEnsinoRepository;

class InstituicaoEnsinoService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new InstituicaoEnsinoRepository();
    }

    public function getInstituicoesEnsino(){
        return $this->repository->getInstituicoesEnsino();
    }

    public function getInstituicaoEnsino($id){
        return $this->repository->getInstituicaoEnsino($id);
    }

}
