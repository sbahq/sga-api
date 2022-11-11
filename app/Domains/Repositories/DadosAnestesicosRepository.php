<?php

namespace App\Domains\Repositories;

use App\Domains\Models\DadosAnestesicos;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class DadosAnestesicosRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new DadosAnestesicos();
        $this->validate = new Validation();
    }

    public function getPeriodoME($matricula)
    {

        $periodos = $this->model->getPeriodoMe($matricula);
        foreach($periodos as $periodo){
            $duracao = 0;
            $atos = 0;
            $inicio = \DateTime::createFromFormat('Y-m-d', $periodo->dt_inicial);
            $fim = \DateTime::createFromFormat('Y-m-d', $periodo->dt_fim);
            $estagios = $this->model->getEstagios($matricula, $inicio->format('Y-m-d'), $fim->format('Y-m-d'));
            foreach($estagios as $estagio){

                $duracao+= $estagio->duracao;
                $atos+= $estagio->atos;

            }

            $arrayMes[] = array(
                'me' => $periodo->ind_me,
                'inicio' => $periodo->dt_inicial,
                'fim' => $periodo->dt_fim,
                'ano_cet' => $periodo->ano_cet,
                'inicio_formatado' => $inicio->format('d/m/Y'),
                'fim_formatado' => $fim->format('d/m/Y'),
                'total_procedimentos' => $atos + $periodo->total_procedimentos,
                'total_minutos' => $periodo->total_minutos + ($duracao*60),
                'total_horas' => floor(($periodo->total_minutos+($duracao*60)) / 60)
            );
        }

        return $arrayMes;

    }

    private function montarComplicacoes($listaAnestesia, &$complicacoes)
    {
        $listaDadosComplicacoes = $this->model->getDadosComplicacoes($listaAnestesia->id);
        if (count($listaDadosComplicacoes)) {

            foreach ($listaDadosComplicacoes as $dadosComplicacoes) {

                if (!isset($complicacoes[$listaAnestesia->especialidade])) {
                    $complicacoes[$listaAnestesia->especialidade]['nome'] = $listaAnestesia->especialidade;
                    $complicacoes[$listaAnestesia->especialidade]['total'] = 1;
                } else {
                    $complicacoes[$listaAnestesia->especialidade]['total'] = $complicacoes[$listaAnestesia->especialidade]['total'] + 1;
                }
                
            }
        } else {
            if (!isset($complicacoes[0])) {
                $complicacoes[0]['nome'] = 'Sem complicações';
                $complicacoes[0]['total'] = 1;
            } else {
                $complicacoes[0]['total'] = $complicacoes[0]['total'] + 1;
            }
        }
    }
}
