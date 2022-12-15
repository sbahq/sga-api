<?php

namespace App\Domains\Repositories;

use App\Domains\Models\Regional;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class RegionalRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Regional();
        $this->validate = new Validation();
    }

    private function returnArrayRegional($regional){
        return array(
            'id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->id),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->nome),
            'presidente' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->presidente),
            'email' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->email),
            'email_presidente' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->email_presidente),
            'matricula_presidente' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->matricula_presidente),
            'sigla' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->sigla),
            'uf' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($regional->uf),
        );
    }

    public function getRegionais(){
        $regionais = $this->model->getRegionais();
        $response = [];
        $return = [];

        if( count($regionais) > 0 ){
            foreach($regionais as $regional){
                array_push($return, $this->returnArrayRegional($regional));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getRegional($id){
        $regionais = $this->model->getRegional($id);
        $response = [];
        $return = [];

        if( count($regionais) > 0 ){
            foreach($regionais as $regional){
                array_push($return, $this->returnArrayRegional($regional));
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
