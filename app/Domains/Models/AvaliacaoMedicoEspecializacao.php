<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AvaliacaoMedicoEspecializacao extends Model
{

    public function getAvaliacoes($matricula){

        $sql = "select ";
        $sql.= "cat.id, ";
        $sql.= "cat.ano_cet, ";
        $sql.= "cat.matriculamembro, ";
        $sql.= "cat.c1 as comportamento_1, ";
        $sql.= "cat.c2 as comportamento_2, ";
        $sql.= "cat.c3 as comportamento_3, ";
        $sql.= "cat.c4 as comportamento_4, ";
        $sql.= "cat.h1 as habilidade_1, ";
        $sql.= "cat.h2 as habilidade_2, ";
        $sql.= "cat.h3 as habilidade_3, ";
        $sql.= "cat.h4 as habilidade_4, ";
        $sql.= "cat.p1 as prova_1, ";
        $sql.= "cat.p2 as prova_2, ";
        $sql.= "cat.p3 as prova_3, ";
        $sql.= "cat.p4 as prova_4, ";
        $sql.= "cat.nota as nota_trimestral, ";
        $sql.= "case ";
        $sql.= "when not (select cnm.NOTA from CET_NOTA_ME cnm where cnm.ANO = cat.ano_cet and cnm.matricula = cat.matriculamembro) is null then (select cnm.NOTA from CET_NOTA_ME cnm where cnm.ANO = cat.ano_cet and cnm.matricula = cat.matriculamembro) ";
        $sql.= "else (select cnms.NOTA from CET_NOTA_ME_SUBSTITUTIVA cnms where cnms.ANO = cat.ano_cet and cnms.matricula = cat.matriculamembro) ";
        $sql.= "end as nota_pn ";
        $sql.= "from Relcet.CET_AVALIACOES_TRIM cat ";
        $sql.= "where cat.matriculamembro = {$matricula} ";
        $sql.= "order by cat.ano_cet desc";
        $avaliacoes = DB::connection('mysql_sbahq')->select($sql);
        return $avaliacoes;

    }

}