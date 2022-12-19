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
            'email' => $medico->email,
            'categoria' => $medico->categoria,
            'categoria_nome' => $medico->categoria_nome,
            'sexo' => $medico->sexo,
            'prezado' => $medico->prezado,
            'tratamento' => $medico->tratamento,
            'cpf' => $medico->cpf,
            'regional' => $medico->regional,
            'situacao' => $medico->situacao,
            'indicador_me' => $medico->indicador_me,
            'data_inicio' => \App\Helpers\AppHelper::instance()->formatDate($medico->data_inicio,'Y-m-d H:i:s', 'Y-m-d'),
            'data_fim' => \App\Helpers\AppHelper::instance()->formatDate($medico->data_fim,'Y-m-d H:i:s', 'Y-m-d'),
            'matricula_cet' => $medico->matricula_cet,
            'cet' => $medico->cet,
            'cet_id' => $medico->cet_id,
            'ano_sba' => $medico->ano_sba,
            'ano_regional' => $medico->ano_regional,
            'data_proximo_vencimento_sba' => $medico->data_proximo_vencimento_sba,
            'data_proximo_vencimento_regional' => $medico->data_proximo_vencimento_regional,
            'anuidade_sba_vencida_status' => $medico->anuidade_sba_vencida_status,
            'anuidade_sba_vencida_status_descricao' => $medico->anuidade_sba_vencida_status,
            'dias_restantes_vencimento_sba' => $medico->dias_restantes_vencimento_sba,
            'anuidade_regional_vencida_status' => $medico->anuidade_regional_vencida_status,
            'anuidade_regional_vencida_status_descricao' => $medico->anuidade_regional_vencida_status_descricao,
            'dias_restantes_vencimento_regional' => $medico->dias_restantes_vencimento_regional,
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

    public function getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET){
        return $this->returnLista($this->model->getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET));
    }

    public function getTodosMedicosEspecializacaoFinalizadoPeriodoME($request){
        return $this->returnLista($this->model->getTodosMedicosEspecializacaoFinalizadoPeriodoME($request));
    }

    public function countTodosMedicosEspecializacaoFinalizadoPeriodoME($request){
        return $this->model->countTodosMedicosEspecializacaoFinalizadoPeriodoME($request);
    }

    public function getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($matriculaCET, $nomeME){
        return $this->returnLista($this->model->getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($matriculaCET, $nomeME));
    }

    public function getMedicosEspecializacao(){
        return $this->returnLista($this->model->getMedicosEspecializacao());
    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        return $this->returnLista($this->model->getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration));
    }

    public function getMedicoEspecializacao($matricula){
        return $this->returnLista($this->model->getMedicoEspecializacao($matricula));
    }

}
