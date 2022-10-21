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

    public function getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET){
        return $this->repository->getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET);
    }

    public function getMedicosEspecializacao(){
        return $this->repository->getMedicosEspecializacao();
    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        return $this->repository->getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration);
    }

}