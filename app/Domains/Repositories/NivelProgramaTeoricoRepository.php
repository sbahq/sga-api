<?php

namespace App\Domains\Repositories;

use App\Domains\Models\NivelProgramaTeorico;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class NivelProgramaTeoricoRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new NivelProgramaTeorico();
        $this->validate = new Validation();
    }

    private function returnArrayNivelProgramaTeorico($nivelProgramaTeorico){
        return array(
            'indicador_me' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($nivelProgramaTeorico->indicador_me),
            'nivel_programa_teorico' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($nivelProgramaTeorico->nivel_programa_teorico),
        );
    }

    public function getNiveisProgramasTeoricos(){
        $niveisProgramasTeoricos = $this->model->getNiveisProgramasTeoricos();
        $response = [];
        $return = [];

        if( count($niveisProgramasTeoricos) > 0 ){
            foreach($niveisProgramasTeoricos as $nivelProgramaTeorico){
                array_push($return, $this->returnArrayNivelProgramaTeorico($nivelProgramaTeorico));
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
