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

    public function getDadosLogbook($matricula)
    {
        try {

            $listaDadosAnestesicos = $this->model->getDadosLogbook($matricula);

            $itemsLogbook = array();
            $sexo = array();
            $idade = array();
            $asa = array();
            $regimeInternacao = array();
            $regimeAtendimento = array();
            $especialidade = array();
            $porte = array();
            $tecnica = array();
            $visitaPaciente = array();
            $comorbidade = array();
            $duracao = array();
            $atos = array();
            $drogas = array();
            $hospitais = array();
            $complicacoes = array();
            $itemsDuracao = [];


            foreach ($listaDadosAnestesicos as $lista) {

                $this->montarComplicacoes($lista, $complicacoes);

                if (!isset($itemsLogbook[$lista->ind_me])) {
                    $itemsLogbook[$lista->ind_me]['nome'] = 'ME - ' . $lista->ind_me;
                    $itemsLogbook[$lista->ind_me]['inicio'] = \DateTime::createFromFormat('Y-m-d', $lista->dt_inicio_me)->format('d/m/Y');
                    $itemsLogbook[$lista->ind_me]['fim'] = \DateTime::createFromFormat('Y-m-d', $lista->dt_fim_me)->format('d/m/Y');
                    $itemsLogbook[$lista->ind_me]['total'] = 1;
                    $itemsLogbook[$lista->ind_me]['dados'] = array();
                } else {
                    $itemsLogbook[$lista->ind_me]['total'] = $itemsLogbook[$lista->ind_me]['total'] + 1;
                }

                if (!isset($itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital])) {
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital] = array();
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['codigo'] = $lista->codigo_hospital;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['nome'] = $lista->hospital;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['total'] = 1;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['total_minutos'] = $lista->duracao;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'] = array();
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['color'] = [rand(0, 100), rand(0, 200), rand(0, 255)];
                } else {
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['total'] = $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['total'] + 1;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['total_minutos'] = $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['total_minutos'] + $lista->duracao;
                }

                if (!isset($itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento])) {
                    $dataProcedimento = \DateTime::createFromFormat('Y-m-d', $lista->data_procedimento)->format('d/m/Y');
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['data'] = $dataProcedimento;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['total'] = 1;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['total_minutos'] = $lista->duracao;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['dados'] = array();
                } else {
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['total'] = $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['total'] + 1;
                    $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['total_minutos'] = $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['total_minutos'] + $lista->duracao;
                }

                $itemsLogbook[$lista->ind_me]['dados'][$lista->codigo_hospital]['dados'][$lista->data_procedimento]['dados'][] = array(
                    'hora_procedimento' => $lista->hora_procedimento,
                    'idade' => $lista->idade,
                    'genero' => (strtolower($lista->genero) == 'feminino' ? 'F' : 'M'),
                    'asa' => $lista->asa,
                    'regime_internacao' => $lista->regime_internacao,
                    'regime_atendimento' => $lista->regime_atendimento,
                    'especialidade' => $lista->especialidade,
                    'porte' => str_replace(' porte', '', $lista->porte),
                    'tecnica' => str_replace('Anestesia ', '', $lista->tecnica),
                    'duracao' => $lista->duracao,
                    'visita_paciente' => $lista->visita_paciente,
                    'comorbidade' => $lista->comorbidade
                );

                // ---------------------------------------------------

                if (!isset($duracao[$lista->ind_me])) {
                    $duracao[$lista->ind_me]['nome'] = 'ME - ' . $lista->ind_me;
                    $duracao[$lista->ind_me]['total'] = $lista->duracao;
                } else {
                    $duracao[$lista->ind_me]['total'] = $duracao[$lista->ind_me]['total'] +  $lista->duracao;
                }

                if (!isset($atos[$lista->ind_me])) {
                    $atos[$lista->ind_me]['nome'] = 'ME - ' . $lista->ind_me;
                    $atos[$lista->ind_me]['total'] = 1;
                } else {
                    $atos[$lista->ind_me]['total'] = $atos[$lista->ind_me]['total'] + 1;
                }

                if (!isset($sexo[$lista->codigo_genero])) {
                    $sexo[$lista->codigo_genero]['nome'] = $lista->genero;
                    $sexo[$lista->codigo_genero]['total'] = 1;
                } else {
                    $sexo[$lista->codigo_genero]['total'] = $sexo[$lista->codigo_genero]['total'] + 1;
                }

                if (!isset($idade[$lista->codigo_idade])) {
                    $idade[$lista->codigo_idade]['nome'] = $lista->idade;
                    $idade[$lista->codigo_idade]['total'] = 1;
                } else {
                    $idade[$lista->codigo_idade]['total'] = $idade[$lista->codigo_idade]['total'] + 1;
                }

                if (!isset($asa[$lista->codigo_asa])) {
                    $asa[$lista->codigo_asa]['nome'] = $lista->asa;
                    $asa[$lista->codigo_asa]['total'] = 1;
                } else {
                    $asa[$lista->codigo_asa]['total'] = $asa[$lista->codigo_asa]['total'] + 1;
                }

                if (!isset($regimeInternacao[$lista->codigo_regime_internacao])) {
                    $regimeInternacao[$lista->codigo_regime_internacao]['nome'] = $lista->regime_internacao;
                    $regimeInternacao[$lista->codigo_regime_internacao]['total'] = 1;
                } else {
                    $regimeInternacao[$lista->codigo_regime_internacao]['total'] = $regimeInternacao[$lista->codigo_regime_internacao]['total'] + 1;
                }

                if (!isset($regimeAtendimento[$lista->codigo_regime_atendimento])) {
                    $regimeAtendimento[$lista->codigo_regime_atendimento]['nome'] = $lista->regime_atendimento;
                    $regimeAtendimento[$lista->codigo_regime_atendimento]['total'] = 1;
                } else {
                    $regimeAtendimento[$lista->codigo_regime_atendimento]['total'] = $regimeAtendimento[$lista->codigo_regime_atendimento]['total'] + 1;
                }

                if (!isset($especialidade[$lista->codigo_especialidade])) {
                    $especialidade[$lista->codigo_especialidade]['nome'] = $lista->especialidade;
                    $especialidade[$lista->codigo_especialidade]['total'] = 1;
                } else {
                    $especialidade[$lista->codigo_especialidade]['total'] = $especialidade[$lista->codigo_especialidade]['total'] + 1;
                }

                if (!isset($porte[$lista->codigo_porte])) {
                    $porte[$lista->codigo_porte]['nome'] = $lista->porte;
                    $porte[$lista->codigo_porte]['total'] = 1;
                } else {
                    $porte[$lista->codigo_porte]['total'] = $porte[$lista->codigo_porte]['total'] + 1;
                }

                if (!isset($tecnica[$lista->codigo_tecnica])) {
                    $tecnica[$lista->codigo_tecnica]['nome'] = str_replace('/', '//', $lista->tecnica);
                    $tecnica[$lista->codigo_tecnica]['total'] = 1;
                } else {
                    $tecnica[$lista->codigo_tecnica]['total'] = $tecnica[$lista->codigo_tecnica]['total'] + 1;
                }

                if (!isset($visitaPaciente[$lista->codigo_visita_paciente])) {
                    $visitaPaciente[$lista->codigo_visita_paciente]['nome'] = $lista->visita_paciente;
                    $visitaPaciente[$lista->codigo_visita_paciente]['total'] = 1;
                } else {
                    $visitaPaciente[$lista->codigo_visita_paciente]['total'] = $visitaPaciente[$lista->codigo_visita_paciente]['total'] + 1;
                }

                if (!isset($hospitais[$lista->codigo_hospital])) {
                    $hospitais[$lista->codigo_hospital]['nome'] = $lista->hospital;
                    $hospitais[$lista->codigo_hospital]['total'] = 1;
                } else {
                    $hospitais[$lista->codigo_hospital]['total'] = $hospitais[$lista->codigo_hospital]['total'] + 1;
                }

                $this->model->montarArrayProcedimentos($lista->codigo_comorbidade, $comorbidade);
                $this->model->montarArrayProcedimentos($lista->drogas, $drogas);
            }

            $itemsDuracao = [];
            foreach ($duracao as $key => $dur) {
                $itemsDuracao[$key]['nome'] = $dur['nome'];
                $itemsDuracao[$key]['total'] = floatval(number_format($dur['total'] / 60, 2, '.', ''));
            }

            return $return = array(
                'genero'                => $sexo,
                'idade'                 => $idade,
                'asa'                   => $asa,
                'regime_internacao'     => $regimeInternacao,
                'regime_atendimento'    => $regimeAtendimento,
                'especialidade'         => $especialidade,
                'porte'                 => $porte,
                'tecnica'               => $tecnica,
                'visita_paciente'       => $visitaPaciente,
                'comorbidade'           => $comorbidade,
                'duracao'               => $itemsDuracao,
                'atos'                  => $atos,
                'drogas'                => $drogas,
                'hospitais'             => $hospitais,
                'complicacoes'          => $complicacoes
            );
        } catch (\Exception $e) {
            return [ $e->getMessage() ];
        }
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
