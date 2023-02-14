<?php

namespace App\Domains\Responses;

use App\Domains\Services\MedicoEspecializacaoService;


class MedicoEspecializacaoResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new MedicoEspecializacaoService();
    }

    public function getMedicosEspecializacaoCET($matriculaCET){
        return $this->service->getMedicosEspecializacaoCET($matriculaCET);
    }

    public function getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET){
        return $this->service->getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET);
    }

    public function getTodosMedicosEspecializacaoFinalizadoPeriodoME($request){
        
        $medicos = $this->service->getTodosMedicosEspecializacaoFinalizadoPeriodoME($request);
        $countMedicos = $this->service->countTodosMedicosEspecializacaoFinalizadoPeriodoME($request);
        return Array(
            'medicos' => $medicos,
            'count' => $countMedicos
        );
    }

    public function countTodosMedicosEspecializacaoFinalizadoPeriodoME($request){
        return $this->service->countTodosMedicosEspecializacaoFinalizadoPeriodoME($request);
    }

    public function getMedicosEspecializacao(){
        return $this->service->getMedicosEspecializacao();
    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        return $this->service->getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration);
    }

    public function getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($matriculaCET, $nomeME){
        return $this->service->getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($matriculaCET, $nomeME);
    }

    public function getMedicoEspecializacao($matricula){
        return $this->service->getMedicoEspecializacao($matricula);
    }

}