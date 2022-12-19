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

    public function getTodosMedicosEspecializacaoFinalizadoPeriodoME($request){
        return $this->repository->getTodosMedicosEspecializacaoFinalizadoPeriodoME($request);
    }

    public function countTodosMedicosEspecializacaoFinalizadoPeriodoME($request){
        return $this->repository->countTodosMedicosEspecializacaoFinalizadoPeriodoME($request);
    }

    public function getMedicosEspecializacao(){
        return $this->repository->getMedicosEspecializacao();
    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        return $this->repository->getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration);
    }

    public function getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($matriculaCET, $nomeME){
        return $this->repository->getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($matriculaCET, $nomeME);
    }

    public function getMedicoEspecializacao($matricula){
        return $this->repository->getMedicoEspecializacao($matricula);
    }

}