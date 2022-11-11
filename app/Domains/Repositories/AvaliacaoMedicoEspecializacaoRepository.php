<?php

namespace App\Domains\Repositories;

use App\Domains\Models\AvaliacaoMedicoEspecializacao;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class AvaliacaoMedicoEspecializacaoRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new AvaliacaoMedicoEspecializacao();
        $this->validate = new Validation();
    }

    private function returnArrayAvaliacao($avaliacao){
        return array(
            'id' => $avaliacao->id,
            'ano_cet' => $avaliacao->ano_cet,
            'matriculamembro' => $avaliacao->matriculamembro,
            'comportamento_1' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->comportamento_1),
            'comportamento_2' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->comportamento_2),
            'comportamento_3' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->comportamento_3),
            'comportamento_4' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->comportamento_4),
            'habilidade_1' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->habilidade_1),
            'habilidade_2' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->habilidade_2),
            'habilidade_3' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->habilidade_3),
            'habilidade_4' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->habilidade_4),
            'prova_1' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->prova_1),
            'prova_2' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->prova_2),
            'prova_3' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->prova_3),
            'prova_4' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->prova_4),
            'nota_trimestral' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->nota_trimestral),
            'nota_pn' => \App\Helpers\AppHelper::instance()->formatarNumero($avaliacao->nota_pn),
            'nota_final' => ($avaliacao->nota_pn + $avaliacao->nota_trimestral)/2
        );
    }

    private function returnLista($avaliacoes){
        $response = [];
        $return = [];

        if( count($avaliacoes) > 0 ){
            foreach($avaliacoes as $avaliacao){
                array_push($return, $this->returnArrayAvaliacao($avaliacao));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getAvaliacoes($matricula){
        return $this->returnLista($this->model->getAvaliacoes($matricula));
    }

}
