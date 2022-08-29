<?php

namespace App\Domains\Repositories;

use App\Domains\Models\MedicoEspecializacao;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class MedicoEspecializacaoRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new MedicoEspecializacao();
        $this->validate = new Validation();
    }

    private function returnArrayMedicoEspecializacao($medico){
        return array(
            'id_pessoa' => $medico->id_pessoa,
            'matricula' => $medico->matricula,
            'nome' => $medico->nome,
            'cpf' => $medico->cpf,
            'indicador_me' => $medico->indicador_me,
            'data_inicio' => \App\Helpers\AppHelper::instance()->formatDate($medico->data_inicio),
            'data_fim' => \App\Helpers\AppHelper::instance()->formatDate($medico->data_fim,),
            'matricula_cet' => $medico->matricula_cet,
            'cet' => $medico->cet,
            'ano_sba' => $medico->ano_sba,
            'ano_regional' => $medico->ano_regional,
        );
    }

    private function returnLista($medicos){
        $response = [];
        $return = [];

        if( count($medicos) > 0 ){
            foreach($medicos as $medico){
                array_push($return, $this->returnArrayMedicoEspecializacao($medico));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getMedicosEspecializacaoCET($matriculaCET){
        return $this->returnLista($this->model->getMedicosEspecializacaoCET($matriculaCET));
    }

}
