<?php

namespace App\Domains\Repositories;

use App\Domains\Models\InstituicoesEnsino;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class InstituicaoEnsinoRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new InstituicoesEnsino();
        $this->validate = new Validation();
    }

    private function returnArrayInstituicaoEnsino($instituicaoEnsino){
        return array(
            'id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->id),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->nome),
            'telefone' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->telefone),
            'celular' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->celular),
            'email' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->email),
            'cnpj' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->cnpj),
            'pais' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->pais),
            'cep' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->cep),
            'uf' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->uf),
            'cidade' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->cidade),
            'bairro' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->bairro),
            'logradouro' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->logradouro),
            'complemento' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->complemento),
            'cargo' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->cargo),
            'id_pessoa' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->id_pessoa),
            'matricula_responsavel' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->matricula_responsavel),
            'nome_responsavel' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->nome_responsavel),
            'cpf' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->cpf),
            'celular_responsavel' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->celular_responsavel),
            'email_responsavel' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instituicaoEnsino->email_responsavel),
        );
    }

    public function getInstituicoesEnsino(){
        $registros = $this->model->getInstituicoesEnsino();
        $response = [];
        $return = [];

        if( count($registros) > 0 ){
            foreach($registros as $registro){
                array_push($return, $this->returnArrayInstituicaoEnsino($registro));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getInstituicaoEnsino($id){
        $registros = $this->model->getInstituicaoEnsino($id);
        $response = [];
        $return = [];

        if( count($registros) > 0 ){
            foreach($registros as $registro){
                array_push($return, $this->returnArrayInstituicaoEnsino($registro));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

}
