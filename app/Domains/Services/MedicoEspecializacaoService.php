<?php

namespace App\Domains\Services;

use App\Domains\Repositories\MedicoEspecializacaoRepository;


class MedicoEspecializacaoService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new MedicoEspecializacaoRepository();
    }


    public function getMedicosEspecializacaoCET($matriculaCET){
        return $this->repository->getMedicosEspecializacaoCET($matriculaCET);
    }

}