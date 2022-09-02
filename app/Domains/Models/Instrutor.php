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

    public function getInstrutoresCET($matriculaCET){

        $sql = "select * from vw_instrutores_vagas viv where viv.matricula_cet = {$matriculaCET} order by nome";
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
