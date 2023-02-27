<?php

namespace App\Domains\Repositories;

use App\Domains\Models\ProgramaTeorico;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class ProgramaTeoricoRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new ProgramaTeorico();
        $this->validate = new Validation();
    }

    private function returnArrayProgramaTeorico($programaTeorico){
        return array(
            'indicador_me' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($programaTeorico->indicador_me),
            'programa_teorico' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($programaTeorico->programa_teorico),
        );
    }

    public function getProgramasTeoricos(){
        $programasTeoricos = $this->model->getProgramasTeoricos();
        $response = [];
        $return = [];

        if( count($programasTeoricos) > 0 ){
            foreach($programasTeoricos as $programaTeorico){
                array_push($return, $this->returnArrayProgramaTeorico($programaTeorico));
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
