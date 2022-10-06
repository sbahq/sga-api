<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicoEspecializacao extends Model
{

    public function getMedicosEspecializacaoCET($matriculaCET){

        $sql = "select * from vw_me_cet vmc where vmc.matricula_cet = {$matriculaCET} order by vmc.nome";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

    public function getMedicosEspecializacao(){

        $sql = "select * from vw_me_cet vmc order by vmc.nome limit 2";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;

    }

    public function getMedicosEspecializacaoComPendencias($matriculaCET, $daysToExpiration){
        $sql = "select * from vw_me_cet vmc where matricula_cet = {$matriculaCET} and (dias_restantes_vencimento_sba = $daysToExpiration or dias_restantes_vencimento_regional = $daysToExpiration) order by nome ";
        $medicos = DB::connection('mysql_sbahq')->select($sql);
        return $medicos;
    }

}