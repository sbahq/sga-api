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
            'id_pessoa' => $instrutor->id_pessoa,
            'matricula' => $instrutor->matricula,
            'nome' => $instrutor->nome,
            'sexo' => $instrutor->sexo,
            'categoria' => $instrutor->categoria,
            'categoria_nome' => $instrutor->categoria_nome,
            'tratamento' => $instrutor->tratamento,
            'prezado' => $instrutor->prezado,
            'email' => $instrutor->email,
            'tipo' => $instrutor->tipo,
            'regional' => $instrutor->regional,
            'ano_cet' => $instrutor->ano_cet,
            'matricula_cet' => $instrutor->matricula_cet,
            'cet' => $instrutor->cet,
            'data_emissao_credencial' => \App\Helpers\AppHelper::instance()->formatDate($instrutor->data_emissao_credencial,'Y-m-d'),
            'data_vencimento_credencial' => \App\Helpers\AppHelper::instance()->formatDate($instrutor->data_vencimento_credencial,'Y-m-d'),
            'dias_restantes_vencimento_credencial' => $instrutor->dias_restantes_vencimento_credencial,
            'status_credencial_vencida' => $instrutor->status_credencial_vencida,
            'status_credencial_vencida_descricao' => $instrutor->status_credencial_vencida_descricao,
            'ano_regional' => $instrutor->ano_regional,
            'ano_sba' => $instrutor->ano_sba,
            'data_proximo_vencimento_sba' => \App\Helpers\AppHelper::instance()->formatDate($instrutor->data_proximo_vencimento_sba,'Y-m-d'),
            'data_proximo_vencimento_regional' => \App\Helpers\AppHelper::instance()->formatDate($instrutor->data_proximo_vencimento_regional,'Y-m-d'),
            'anuidade_sba_vencida_status' => $instrutor->anuidade_sba_vencida_status,
            'anuidade_sba_vencida_status_descricao' => $instrutor->anuidade_sba_vencida_status_descricao,
            'dias_restantes_vencimento_sba' => $instrutor->dias_restantes_vencimento_sba,
            'anuidade_regional_vencida_status' => $instrutor->anuidade_regional_vencida_status,
            'anuidade_regional_vencida_status_descricao' => $instrutor->anuidade_regional_vencida_status_descricao,
            'dias_restantes_vencimento_regional' => $instrutor->dias_restantes_vencimento_regional,            
        );
    }

    private function returnLista($instrutores){
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

    public function getInstrutores(){
        return $this->returnLista($this->model->getInstrutores());
    }

    public function getInstrutoresCet($matriculaCET){
        return $this->returnLista($this->model->getInstrutoresCET($matriculaCET));
    }

    public function getTotalInstrutoresCETById($cetID){
        $totalInstrutores = $this->model->getTotalInstrutoresCETById($cetID);
        $response = [];
        $return = [];

        array_push($return, array('total_instrutores_regularizados' => $totalInstrutores[0]->total_instrutores_regulares));
        $response = $this->validate->getSuccessMessage();
        $response['items'] = $return;
        return $response;
    }

    public function getResponsaveisCET(){
        return $this->returnLista($this->model->getResponsaveisCET());
    }

    public function getInstrutoresComPendencias($matriculaCET, $daysToExpiration){
        return $this->returnLista($this->model->getInstrutoresComPendencias($matriculaCET, $daysToExpiration));
    }

}