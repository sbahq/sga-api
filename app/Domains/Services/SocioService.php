<?php

namespace App\Domains\Services;

use App\Domains\Repositories\SocioRepository;


class SocioService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SocioRepository();
    }

    public function getSociosEmDia($field, $value){
        return $this->repository->getSociosEmDia($field, $value);
    }

    public function getAllSociosEmDia(){
        return $this->repository->getAllSociosEmDia();
    }

    public function getAnuidadeSocio($cpf){
        return $this->repository->getAnuidadeSocio($cpf);
    }

    public function saveBoletosItau( array $data ){
        return $this->repository->saveBoletosItau($data);
    }

    public function getSocioByEmail($email){
        return $this->repository->getSocioByEmail($email);
    }

    public function getSocioByName($nome){
        return $this->repository->getSocioByName($nome);
    }

    public function getSocioByMatricula($matricula){
        return $this->repository->getSocioByMatricula($matricula);
    }

    public function getUsuarioByMatricula($matricula){
        return $this->repository->getUsuarioByMatricula($matricula);
    }

    public function autenticarSocio($user, $password){
        return $this->repository->autenticarSocio( $user, $password);
    }

    public function getAssociadoCPF($cpf){
        return $this->repository->getAssociadoCPF( $cpf );
    }

    public function getAssociadoEmail($email){
        return $this->repository->getAssociadoEmail( $email );
    }

    public function getPessoaCPF($cpf){
        return $this->repository->getPessoaCPF( $cpf );
    }

    public function getPessoaSecret3CPF($cpf){
        return $this->repository->getPessoaSecret3CPF( $cpf );
    }

}
