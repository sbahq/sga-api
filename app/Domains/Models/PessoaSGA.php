<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PessoaSGA extends Model
{

    public function getPessoaByMatricula($matricula){
        $pessoa = DB::connection('mysql_sbahq')->select("select * from vw_pessoas vp where vp.matricula = {$matricula}");
        return $pessoa;
    }

    public function getMembrosComissaoCET(){
        $membrosComissaoCET = DB::connection('mysql_sbahq')->select("select * from vw_membros_comissao_cet where cargo <> 'PRESIDENTE' ");
        return $membrosComissaoCET;
    }

    public function getPresidenteComissaoCET(){
        $membrosComissaoCET = DB::connection('mysql_sbahq')->select("select * from vw_membros_comissao_cet where cargo = 'PRESIDENTE'");
        return $membrosComissaoCET;
    }

    public function getSecretarioGeral(){
        $secretarioGeral = DB::connection('mysql_sbahq')->select("select * from vw_secretario_geral");
        return $secretarioGeral;
    }

    public function getSenhaUsuario($idPessoa){
        $senhaUsuario = DB::connection('mysql_sbahq')->select("select SENHA as senha from USUARIOS u where u.ID_PESSOA ={$idPessoa}");
        return $senhaUsuario;
    }

    public function getResponsaveisCertificadoSaida(){
        $responsaveisCertificadoSaida = DB::connection('mysql_sbahq')->select("select * from vw_responsaveis_certificado_saida");
        return $responsaveisCertificadoSaida;
    }

}