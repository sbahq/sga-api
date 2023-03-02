<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicoEspecializacao extends Model
{

    public function getMedicosEspecializacaoCET($matriculaCET){

        $sql = "
        select * from vw_me_cet vmc
        where
        vmc.matricula_cet = {$matriculaCET}
        and vmc.situacao LIKE 'ME%'
        and vmc.indicador_me = (select max(v.indicador_me) from vw_me_cet v where v.matricula = vmc.matricula) 
        order by vmc.nome
        ";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

    public function getMedicosEspecializacaoFinalizadoPeriodoME($matriculaCET){

        $sql = "select * from vw_me_cet vmc where lower(vmc.situacao) = 'desligado falta ce' and year(vmc.data_fim) = year(now()) and vmc.indicador_me = 3 and vmc.matricula_cet = {$matriculaCET} order by vmc.data_fim desc, vmc.nome";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

    public function getTodosMedicosEspecializacaoFinalizadoPeriodoME($requestAll){
        
        $limit = ( isset($requestAll['limit']) ? $requestAll['limit'] : 10 );
        $offSet = ( isset($requestAll['offset']) ? $requestAll['offset'] : 0 );

        $sql = "select * from vw_me_cet vmc where lower(vmc.situacao) = 'desligado falta ce' and vmc.indicador_me = 3 ";
        if( isset($requestAll['cet_id']) )
            if( $requestAll['cet_id'] != '' ) $sql.= " and vmc.cet_id = " . $requestAll['cet_id'];
        
        if( isset($requestAll['nome']) )
            if( trim($requestAll['nome']) != '' ) $sql.= " and vmc.nome like '%" . $requestAll['nome']."%'";

        $sql.=" order by vmc.cet, vmc.nome limit {$limit} offset {$offSet}";
        
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

    public function countTodosMedicosEspecializacaoFinalizadoPeriodoME($requestAll){

        $sql = "select count(*) as total_medicos from vw_me_cet vmc where lower(vmc.situacao) = 'desligado falta ce' and vmc.indicador_me = 3 ";

        if( isset($requestAll['cet_id']) )
            if( $requestAll['cet_id'] != '' ) $sql.= " and vmc.cet_id = " . $requestAll['cet_id'];
        
        if( isset($requestAll['nome']) )
            if( trim($requestAll['nome']) != '' ) $sql.= " and vmc.nome like '%" . $requestAll['nome']."%'";

        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

    public function getMedicosEspecializacaoFinalizadoPeriodoMEByMatriculaCETNome($matriculaCET, $nomeME){

        $medicos = DB::connection('mysql_sbahq')->table('vw_me_cet')
                                                ->where("lower(situacao)","desligado falta ce")
                                                ->where("indicador_me","3")
                                                ->where('matricula_cet', $matriculaCET)
                                                ->where('nome', 'like', '%'. $nomeME .'%')
                                                ->orderBy('data_fim desc')
                                                ->get();
        return $medicos;

    }

    public function getMedicoEspecializacao($matricula){
        $medicos = DB::connection('mysql_sbahq')->table('vw_me_cet')
                                                ->where('matricula', $matricula)
                                                ->get();
        return $medicos;
    }

    public function getMedicosEspecializacao(){

        $sql = "select * from vw_me_cet vmc order by vmc.nome";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        $sql = "select * from vw_me_cet vmc where matricula_cet = {$matriculaCET} and (dias_restantes_vencimento_sba = $daysToExpiration or dias_restantes_vencimento_regional = $daysToExpiration) order by nome ";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;
    }

}