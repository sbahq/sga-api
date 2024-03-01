<?php

namespace App\Domains\Repositories;

use App\Domains\Models\LigaAcademica;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class LigaAcademicaRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new LigaAcademica();
        $this->validate = new Validation();
    }

    private function returnArrayLigaAcademica($ligaAcademica){
        return array(
            'id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ligaAcademica->id),
            'id_instituicao_ensino' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ligaAcademica->id_instituicao_ensino),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ligaAcademica->nome),
            'tipo_liga' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($ligaAcademica->tipo_liga)
        );
    }

    public function getLigasAcademicas($idInstituicaoEnsino){

        $registros = $this->model->getLigasAcademicas($idInstituicaoEnsino);
        $response = [];
        $return = [];

        if( count($registros) > 0 ){
            foreach($registros as $registro){
                array_push($return, $this->returnArrayLigaAcademica($registro));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;

    }

    public function getLigaAcademica($idLigaAcademica){

        $registros = $this->model->getLigaAcademica($idLigaAcademica);
        $response = [];
        $return = [];

        if( count($registros) > 0 ){
            foreach($registros as $registro){
                array_push($return, $this->returnArrayLigaAcademica($registro));
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
