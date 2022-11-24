<?php

namespace App\Domains\Repositories;

use App\Domains\Models\PessoaSGA;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class PessoaSGARepository
{
    private $model;
    public function __construct()
    {
        $this->model = new PessoaSGA();
        $this->validate = new Validation();
    }

    private function returnArrayPessoa($pessoa){
        return array(
            'id_pessoa' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->id_pessoa),
            'matricula' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->matricula),
            'cargo' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->cargo),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->nome),
            'cpf' => $pessoa->cpf,
            'email' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->email),
            'celular' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->celular),
            'sexo' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->sexo),
            'tratamento' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->tratamento),
            'prezado' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->prezado),
            'artigo' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->artigo),
            'data_nascimento' => $pessoa->data_nascimento,
            'crm' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->crm),
            'uf_crm' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->uf_crm),
            'categoria' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->categoria),
            'categoria_nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->categoria_nome),
            'categoria_anterior_1' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->categoria_anterior_1),
            'categoria_anterior_1_nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->categoria_anterior_1_nome),
            'categoria_anterior_2' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->categoria_anterior_2),
            'categoria_anterior_2_nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->categoria_anterior_2_nome),
            'situacao' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->situacao),
            'pais' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->pais),
            'uf' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->uf),
            'municipio' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->municipio),
            'endereco' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->endereco),
            'complemento' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pessoa->complemento),
            'cep' => $pessoa->cep,
        );
    }

    public function getPessoaByMatricula($matricula){

        $pessoas = $this->model->getPessoaByMatricula($matricula);
        $response = [];
        $return = [];

        if( count($pessoas) > 0 ){
            foreach($pessoas as $pessoa){
                array_push($return, $this->returnArrayPessoa($pessoa));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;

    }

    public function getMembrosComissaoCET(){

        $pessoas = $this->model->getMembrosComissaoCET();
        $response = [];
        $return = [];

        if( count($pessoas) > 0 ){
            foreach($pessoas as $pessoa){
                array_push($return, $this->returnArrayPessoa($pessoa));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;

    }

    public function getPresidenteComissaoCET(){
        $pessoas = $this->model->getPresidenteComissaoCET();
        $response = [];
        $return = [];

        if( count($pessoas) > 0 ){
            foreach($pessoas as $pessoa){
                array_push($return, $this->returnArrayPessoa($pessoa));
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
