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

    public function getSecretarioGeral(){
        return $this->repository->getSecretarioGeral();
    }

    public function getSenhaUsuario($idPessoa){
        return $this->repository->getSenhaUsuario($idPessoa);
    }

    public function getPresidenteComissaoCET(){
        return $this->repository->getPresidenteComissaoCET();
    }

    public function getResponsaveisCertificadoSaida(){
        return $this->repository->getResponsaveisCertificadoSaida();
    }

    public function getResponsaveisCertificadoSaidaAno($ano){
        return $this->repository->getResponsaveisCertificadoSaidaAno($ano);
    }

}