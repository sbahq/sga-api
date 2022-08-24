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

}
