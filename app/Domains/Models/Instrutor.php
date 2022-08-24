<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Instrutor extends Model
{

    public function getInstrutores(){

        $sql = "select ";
        $sql.= "p.ID_PESSOA as id_pessoa, ";
        $sql.= "s.MATRICULA as matricula, ";
        $sql.= "p.NOME as nome, ";
        $sql.= "max(date(sm.DT_1VIA)) as data_credencial, ";
        $sql.= "max(date(sm.DT_1VIA))+ INTERVAL 5 YEAR as data_vencimento, ";
        $sql.= "ci.ANO_CET as ano_cet, ";
        $sql.= "ci.MATRICULA as matricula_cet, ";
        $sql.= "o.DESCRICAO as cet ";
        $sql.= "from CET_INSTRUTOR ci join SDC_MB sm  ";
        $sql.= "on ci.MATRICULAMEMBRO = sm.MATRICULA  join SECRET2 s  ";
        $sql.= "on s.MATRICULA = sm.MATRICULA and s.MATRICULA = ci.MATRICULAMEMBRO join PESSOA p  ";
        $sql.= "on p.ID_PESSOA = s.ID_PESSOA join CET_CET cc  ";
        $sql.= "on cc.MATRICULA = ci.MATRICULA join ORGAO o  ";
        $sql.= "on o.ID_ORGAO = cc.ID_ORGAO  ";
        $sql.= "where ";
        $sql.= "sm.ID_TIPO in(4,5,6) ";
        //$sql.= "and ci.ANO_CET = year(now()) ";
        $sql.= "and o.ATIVO = 'S' ";
        $sql.= "group by ";
        $sql.= "p.ID_PESSOA, s.MATRICULA, p.NOME, ci.ANO_CET, ci.MATRICULA, o.DESCRICAO order by o.DESCRICAO, p.NOME limit 5";

        $instrutores = DB::connection('mysql_sbahq')->select($sql);
        return $instrutores;

    }

}
