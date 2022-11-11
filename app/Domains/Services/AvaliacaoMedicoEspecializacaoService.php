<?php

namespace App\Domains\Services;

use App\Domains\Repositories\AvaliacaoMedicoEspecializacaoRepository;


class AvaliacaoMedicoEspecializacaoService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AvaliacaoMedicoEspecializacaoRepository();
    }

    public function getAvaliacoes($matricula){
        return $this->repository->getAvaliacoes($matricula);
    }

}