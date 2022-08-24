<?php

namespace App\Domains\Repositories;

use App\Domains\Models\Instrutor;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class InstrutorRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Instrutor();
        $this->validate = new Validation();
    }

    private function returnArrayInstrutor($instrutor){
        return array(
            'id_pessoa' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instrutor->id_pessoa),
            'matricula' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instrutor->matricula),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instrutor->nome),
            'data_credencial' => \App\Helpers\AppHelper::instance()->formatDate($instrutor->data_credencial,'Y-m-d'),
            'data_vencimento' => \App\Helpers\AppHelper::instance()->formatDate($instrutor->data_vencimento,'Y-m-d'),
            'ano_cet' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instrutor->ano_cet),
            'matricula_cet' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($instrutor->matricula_cet),
            'cet' => $instrutor->cet,
        );
    }

    public function getInstrutores(){
        $instrutores = $this->model->getInstrutores();
        $response = [];
        $return = [];

        if( count($instrutores) > 0 ){
            foreach($instrutores as $instrutor){
                array_push($return, $this->returnArrayInstrutor($instrutor));
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
