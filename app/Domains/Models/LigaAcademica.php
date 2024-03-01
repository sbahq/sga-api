<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LigaAcademica extends Model
{

    public function getLigasAcademicas($idInstituicaoEnsino){
        $sql = "select s.* from (select @id_instituicao_ensino_vw_ligas_academicas:={$idInstituicaoEnsino}) p ,vw_ligas_academicas s";
        $ligasAcademicas = DB::connection('mysql_sbahq')->select($sql);
        return $ligasAcademicas;
    }

    public function getLigaAcademica($idLigaAcademica){
        $sql = "select s.* from (select @id_liga_academica_vw_liga_academica:={$idLigaAcademica}) p ,vw_liga_academica s";
        $ligaAcademica = DB::connection('mysql_sbahq')->select($sql);
        return $ligaAcademica;
    }

}