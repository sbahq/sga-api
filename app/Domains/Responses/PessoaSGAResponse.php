<?php

namespace App\Domains\Responses;

use App\Domains\Services\PessoaSGAService;

class PessoaSGAResponse
{
    private $service;

    public function __construct()
    {
        $this->service = new PessoaSGAService();
    }

    public function getPessoaByMatricula($matricula){
        return $this->service->getPessoaByMatricula($matricula);
    }

    public function getMembrosComissaoCET(){
        return $this->service->getMembrosComissaoCET();
    }

    public function getPresidenteComissaoCET(){
        return $this->service->getPresidenteComissaoCET();
    }

    public function getSecretarioGeral(){
        return $this->service->getSecretarioGeral();
    }

    public function getSenhaUsuario($idPessoa){
        return $this->service->getSenhaUsuario($idPessoa);
    }

    public function getResponsaveisCertificadoSaida(){
        return $this->service->getResponsaveisCertificadoSaida();
    }

    public function getResponsaveisCertificadoSaidaAno($ano){
        return $this->service->getResponsaveisCertificadoSaidaAno($ano);
    }

}