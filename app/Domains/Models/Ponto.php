<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ponto extends Model
{

    public function getPontos(){
        $pontos = DB::connection('mysql_talento')->select("select * from pontos order by numero");
        return $pontos;
    }

    public function getPontosMatricula($matricula){
        $sql = "
        select
        p.id,
        p.indicador_me,
        p.numero,
        p.nome
        from
        pontos_instrutor ppi join pontos p
        on ppi.ponto_id = p.id 
        where matricula = {$matricula}
        order by
        p.indicador_me, p.numero    
        ";
        $pontos = DB::connection('mysql_talento')->select($sql);
        return $pontos;
    }

}