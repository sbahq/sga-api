<?php

namespace App\Domains\Repositories;

use App\Domains\Models\HospitalMEC;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class HospitalMECRepository
{

    private $model;
    private $validate;
    public function __construct()
    {
        $this->model = new HospitalMEC();
        $this->validate = new Validation();
    }

    private function returnArrayHospitais($hospital){
        return array(
            'id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($hospital->id),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($hospital->nome),
            'ativo' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($hospital->ativo),
        );
    }

    public function getHospitais(){
        $hospitais = $this->model->getHospitais();
        $response = [];
        $return = [];

        if( count($hospitais) > 0 ){
            foreach($hospitais as $hospital){
                array_push($return, $this->returnArrayHospitais($hospital));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getHospital($id){
        $hospitais = $this->model->getHospital($id);
        $response = [];
        $return = [];

        if( count($hospitais) > 0 ){
            foreach($hospitais as $hospital){
                array_push($return, $this->returnArrayHospitais($hospital));
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