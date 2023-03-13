<?php

namespace App\Domains\Repositories;

use App\Domains\Models\PontoInstrutor;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class PontoInstrutorRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new PontoInstrutor();
        $this->validate = new Validation();
    }

    private function returnArrayPontoInstrutor($pontoInstrutor){
        return array(
            'ponto_id' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pontoInstrutor->ponto_id),
            'matricula' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($pontoInstrutor->matricula),
        );
    }

    public function getPontosInstrutor($matricula){

        $pontosInstrutor = $this->model->getPontosInstrutor($matricula);
        $response = [];
        $return = [];

        if( count($pontosInstrutor) > 0 ){
            foreach($pontosInstrutor as $pontoInstrutor){
                array_push($return, $this->returnArrayPontoInstrutor($pontoInstrutor));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;

    }

    public function savePontosInstrutor($request){
        $data = $request->all();
        $pontos = explode(',', $data['pontos']); 
        $dataSave = [];
        for($i=0;($i<count($pontos)-1);$i++){
            $dataSave[] = Array(
                'ponto_id' => $pontos[$i],
                'matricula' => $data['instrutor']
            );
        }
        $this->model->deletePontosInstrutor($data['instrutor']);
        if( count($dataSave) == 0 ) return 1;
        else return $this->model->savePontosInstrutor($dataSave);
    }

}