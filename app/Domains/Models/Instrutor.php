<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Instrutor extends Model
{

    public function getInstrutores(){

        $sql = "select * from vw_instrutores_vagas viv order by nome";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getResponsaveisCET(){

        $sql = "select * from vw_instrutores_vagas viv where tipo = 'RESPONSAVEL' order by nome limit 2";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getInstrutoresComPendencias($matriculaCET, $daysToExpiration){

        $sql = "select * from vw_instrutores_vagas viv where tipo <> 'RESPONSAVEL' and viv.matricula_cet = {$matriculaCET} and (dias_restantes_vencimento_credencial = $daysToExpiration or dias_restantes_vencimento_sba = $daysToExpiration or dias_restantes_vencimento_regional = $daysToExpiration) order by nome";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getInstrutoresComPendenciasComTSA($matriculaCET, $daysToExpiration){

        $sql = "select * from vw_instrutores_vagas viv where viv.tsa = 'S' and tipo <> 'RESPONSAVEL' and viv.matricula_cet = {$matriculaCET} and (dias_restantes_vencimento_credencial = $daysToExpiration or dias_restantes_vencimento_sba = $daysToExpiration or dias_restantes_vencimento_regional = $daysToExpiration) order by nome";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getInstrutoresCET($matriculaCET){

        $sql = "select * from vw_instrutores_vagas viv where viv.matricula_cet = {$matriculaCET} order by nome";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getInstrutoresCETComTSA($matriculaCET){

        $sql = "select * from vw_instrutores_vagas viv where viv.tsa = 'S' and viv.matricula_cet = {$matriculaCET} order by nome";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getInstrutoresRegularesCET($matriculaCET){

        $sql ="select * from vw_instrutores_vagas viv where ";
        $sql.=" viv.matricula_cet = {$matriculaCET} ";
        $sql.=" and viv.tipo <> 'RESPONSAVEL' ";
        $sql.=" and viv.dias_restantes_vencimento_credencial  > 0 ";
        $sql.=" and viv.dias_restantes_vencimento_sba > 0 ";
        $sql.=" and viv.dias_restantes_vencimento_regional > 0";
        $sql.= " order by nome";
        
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getInstrutor($matricula){

        $sql ="select * from vw_instrutores_vagas viv where ";
        $sql.=" viv.matricula = {$matricula} ";
        
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

    public function getTotalInstrutoresCETById($cetID){

        $sql = "select ";
        $sql.="count(*) total_instrutores_regulares ";
        $sql.="from ";
        $sql.="vw_instrutores_vagas v ";
        $sql.="where ";
        $sql.="v.cet_id = {$cetID} ";
        $sql.="and v.dias_restantes_vencimento_credencial  > 0 ";
        $sql.="and v.dias_restantes_vencimento_sba > 0 ";
        $sql.="and v.dias_restantes_vencimento_regional > 0";
        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

}
