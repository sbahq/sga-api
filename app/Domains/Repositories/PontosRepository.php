<?php

namespace App\Domains\Repositories;

use App\Domains\Models\Ponto;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class PontosRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Ponto();
        $this->validate = new Validation();
    }

    private function returnArrayPonto($ponto){
        return array(
            'id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ponto->id),
            'numero' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ponto->numero),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ponto->nome),
            'indicador_me' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ponto->indicador_me),
        );
    }

    public function getPontos(){

        $pontos = $this->model->getPontos();
        $response = [];
        $return = [];

        if( count($pontos) > 0 ){
            foreach($pontos as $ponto){
                array_push($return, $this->returnArrayPonto($ponto));
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