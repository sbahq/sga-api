<?php

namespace App\Domains\Responses;

use App\Domains\Services\InstrutorService;
use App\Domains\Services\MedicoEspecializacaoService;
use Illuminate\Support\Facades\Http;

class VagaResponse
{
    private $instrutorService;
    private $medicoEspecializacaoService;

    public function __construct()
    {
        $this->instrutorService = new InstrutorService();
        $this->medicoEspecializacaoService = new MedicoEspecializacaoService();
    }

    public function dadosVaga($matriculaCET){

        $dadosCET = Http::withHeaders([
            'token' => \App\Helpers\AppConstantes::instance()->tokenAPI
        ])->get('http://10.5.0.8/api/third-party/v1/cet-matricula/'.$matriculaCET);
        $medicosPropostas = Http::get('http://10.5.0.4/public/index.php/api/propostas-andamento/'.$matriculaCET);
        $medicosEmEspecializacao = $this->medicoEspecializacaoService->getMedicosEspecializacaoCET($matriculaCET);
        $totalMedicosPropostas = 0;

        // Verifica se o medico que está na propostas já foi importado para o sistema do SGA
        if( isset($medicosPropostas['items']) ){
            if( isset($medicosEmEspecializacao['items']) ){
                foreach($medicosPropostas['items'] as $medicoProposta){
                    $key = array_search($medicoProposta['cpf'], array_column($medicosEmEspecializacao['items'], 'cpf'));
                    if( $key === false )
                        $totalMedicosPropostas++;
                }
            } else {
                $totalMedicosPropostas = count($medicosPropostas['items']);
            }
        }
        
        $totalMedicosEmEspecializacao = isset($medicosEmEspecializacao['items']) ? count($medicosEmEspecializacao['items']) : 0;
        $instrutores = $this->instrutorService->getInstrutoresCet($matriculaCET);
        $totalInstrutoresRegularizados = 0;
        $totalInstrutoresNaoRegularizados = 0;
        $dataReturn = [];
        $instrutoresComPendencias = [];

        foreach($instrutores['items'] as $instrutor){
            
            $isPendencia = false;
            $isPendenciaCredencial = false;
            $isPendenciaAnuidadeSBA = false;
            $isPendenciaAnuidadeRegional = false;

            if($instrutor['status_credencial_vencida'] == 1){
                $isPendencia = true;
                $isPendenciaCredencial = true;
            }

            if($instrutor['anuidade_sba_vencida_status'] == 1){
                $isPendencia = true;
                $isPendenciaAnuidadeSBA = true;
            }
            
            if($instrutor['anuidade_regional_vencida_status'] == 1){
                $isPendencia = true;
                $isPendenciaAnuidadeRegional = true;
            }

            if( $isPendencia ){
                $totalInstrutoresNaoRegularizados++;
                $instrutoresComPendencias[] = Array(
                    'nome' => $instrutor['nome'],
                    'texto_credencial' =>  $isPendenciaCredencial ? 'Credencial vencida' : '',
                    'credencial' =>  $isPendenciaCredencial ? $instrutor['data_vencimento_credencial'] : '',
                    'texto_anuidade_sba' =>  $isPendenciaAnuidadeSBA ? 'Anuidade SBA vencida' : '',
                    'anuidade_sba' => $isPendenciaAnuidadeSBA ? $instrutor['data_proximo_vencimento_sba'] : '',
                    'texto_anuidade_regional' =>  $isPendenciaAnuidadeRegional ? 'Anuidade regional vencida' : '',
                    'anuidade_regional' => $isPendenciaAnuidadeRegional ? $instrutor['data_proximo_vencimento_regional'] : '',
                ); 

            } else {
                $totalInstrutoresRegularizados++;
            }
        }

        if( $totalInstrutoresRegularizados > 2 )
            $totalVagasPassiveisUso  = $this->calculaVagasDisponiveis($totalInstrutoresRegularizados, $totalMedicosEmEspecializacao, $totalMedicosPropostas);
        else
            $totalVagasPassiveisUso = 0;

        $dataReturn = Array(
            'totalMedicosEmEspecializacao' => $totalMedicosEmEspecializacao,
            'totalPropostasEmAndamento' => $totalMedicosPropostas,
            'instrutoresComPendencias' => $instrutoresComPendencias,
            'totalInstrutores' => $totalInstrutoresRegularizados + $totalInstrutoresNaoRegularizados,
            'totalInstrutoresRegularizados' => $totalInstrutoresRegularizados,
            'totalInstrutoresNaoRegularizados' => $totalInstrutoresNaoRegularizados,
            'totalVagasPassiveisUso' => 10,//$totalVagasPassiveisUso,
            'cetBloqueado' => 0//$totalInstrutoresRegularizados < 3 ? 1 : 0,
        );

        return $dataReturn;
    }

    private function calculaVagasDisponiveis($totalInstrutores, $totalMedicosEmEspecializacao, $totalMedicosPropostas){

        $instrutorVaga = 4;
        $totalVagas = ($totalInstrutores * $instrutorVaga) - ($totalMedicosEmEspecializacao + $totalMedicosPropostas);
        return $totalVagas;

    }

}