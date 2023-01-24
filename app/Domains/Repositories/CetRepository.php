<?php

namespace App\Domains\Repositories;

use App\Domains\Models\Cet;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class CetRepository
{

    private $model;
    public function __construct()
    {
        $this->model = new Cet();
        $this->validate = new Validation();
    }

    private function returnArrayCet($cet){
        return array(
            'id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->id),
            'matricula' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->matricula),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->nome),
            'email' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->email),
            'hospital_sede' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->hospital_sede),
            'uf' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->uf),
            'id_regional' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->id_regional),
            'cnrm' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->cnrm),
            'responsavel' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->responsavel),
        );
    }

    private function returnArrayCetVaga($cet){
        return array(
            'id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->id),
            'matricula' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->matricula),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($cet->nome),
            'propostas_andamento' => $cet->propostas_andamento,
            'medicos_especializacao' => $cet->medicos_especializacao,
            'medicos_especializacao_saida' => $cet->medicos_especializacao_saida,
            'medicos_especializacao_primeira_saida' => $cet->medicos_especializacao_primeira_saida,
            'medicos_especializacao_ultima_saida' => $cet->medicos_especializacao_ultima_saida,
            'instrutores_com_tsa' => $cet->instrutores_com_tsa,
            'instrutores_regulares' => $cet->instrutores_regulares,
            'instrutores_irregulares' => $cet->instrutores_irregulares,
            'vagas_disponiveis' => $cet->vagas_disponiveis,
            'bloqueado' => $cet->bloqueado,
        );
    }

    public function getCets(){
        $cets = $this->model->getCets();
        $response = [];
        $return = [];

        if( count($cets) > 0 ){
            foreach($cets as $cet){
                array_push($return, $this->returnArrayCet($cet));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getCet($id){
        $cets = $this->model->getCet($id);
        $response = [];
        $return = [];

        if( count($cets) > 0 ){
            foreach($cets as $cet){
                array_push($return, $this->returnArrayCet($cet));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }


    public function getVagasCet($cetid = null){
        $cets = $this->model->getVagasCet($cetid);
        $response = [];
        $return = [];

        if( count($cets) > 0 ){
            foreach($cets as $cet){
                array_push($return, $this->returnArrayCetVaga($cet));
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
