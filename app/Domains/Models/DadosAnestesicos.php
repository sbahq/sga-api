<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DadosAnestesicos extends Model
{

    public function getDadosComplicacoes($id){
        $sql = "select sc.ID as id, (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sc.grupo ) as complicacao from SGAP.SGAP_COMPLICACOES sc where sc.ID_Anestesia = {$id}";
        $dadosComplicacoes = DB::connection('mysql_sbahq')->select($sql);
        return $dadosComplicacoes;
    }

    public function montarArrayProcedimentos($procedimento,&$items){

        if(strpos($procedimento,",")>0){
            $codigo = explode(",",$procedimento);
        }else{
            $codigo[] = $procedimento;
        }
        $texto = [];
        foreach($codigo as $cod){
            if( strlen(trim($cod)) > 0 ){
                $sql = "select * from SGAP.SGAP_CODIGOS where code = {$cod}";
                $dadosCodigos = DB::connection('mysql_sbahq')->select($sql);
                foreach($dadosCodigos as $dado){
                    if( !isset($items[$cod]) ){
                        $items[$cod]['nome'] = $dado->procedimento;
                        $items[$cod]['total'] = 1;
                    } else {
                        $items[$cod]['total'] = $items[$cod]['total'] + 1;
                    }
                }
            } else {
                $items[$cod]['nome'] = 'Não especificado';
                $items[$cod]['total'] = 1;
            }
        }
    }

    public function getDadosIndicadorME($matricula, $indicadorME){

        $sql = "
        select
        p.ID_PESSOA as id_pessoa,
        s.MATRICULA as matricula,
        p.NOME as nome,
        p.CPF as cpf,
        s.NASCI as data_nascimento,
        cm.ANO_CET as ano_cet,
        cm.IND_ME,
        date(cm.DT_INICIAL) as data_inicio,
        date(cm.DT_FIM) as data_fim,
        cc.HOSPSEDE as nome_hospital_sede,
        o.DESCRICAO as cet_nome
        from
        CET_ME cm join SECRET2 s
        on s.MATRICULA = cm.MATRICULAMEMBRO join PESSOA p 
        on p.ID_PESSOA = s.ID_PESSOA join CET_CET cc
        on cc.MATRICULA = cm.MATRICULA join ORGAO o 
        on o.ID_ORGAO = cc.ID_ORGAO
        where cm.MATRICULAMEMBRO = {$matricula}
        and cm.IND_ME = {$indicadorME}
        ";
        
        return DB::connection('mysql_sbahq')->select($sql);

    }

    public function getPeriodoME($matricula){

        $sql = "
        select
        cm.IND_ME as ind_me,
        cm.MATRICULAMEMBRO as matriculamembro,
        cm.ANO_CET as ano_cet,
        date(min(cm.DT_INICIAL)) as dt_inicial,
        date(max(cm.DT_FIM)) as dt_fim,
        (select count(sa.duracao) from SGAP.SGAP_ANESTESIAS sa where sa.Matricula = {$matricula} and date(sa.`DATA`) >= date(min(cm.DT_INICIAL)) and date(sa.`DATA`) <=date(max(cm.DT_FIM))) as total_procedimentos,
        (select sum(sa.duracao) from SGAP.SGAP_ANESTESIAS sa where sa.Matricula = {$matricula} and date(sa.`DATA`) >= date(min(cm.DT_INICIAL)) and date(sa.`DATA`) <=date(max(cm.DT_FIM))) as total_minutos
        from CET_ME cm 
        where MATRICULAMEMBRO = {$matricula}
        group by
        cm.IND_ME,
        cm.ANO_CET,
        cm.MATRICULAMEMBRO";

        return DB::connection('mysql_sbahq')->select($sql);

    }

    public function getEstagios($matricula, $inicio, $fim){

        $sql = "select
        cc.MATRICULA as cet,
        cc.HOSPSEDE as hospsede,
        ce.matriculamembro as matricula,
        ce.inicio as dt_inicio_me,
        ce.fim as dt_fim_me,
        ce.e1 as duracao,
        ce.e2 as atos
        from
        Relcet.CET_ESTAGIOS ce join sbahq.CET_CET cc
        on ce.MATRICULA = cc.MATRICULA
        where ce.matriculamembro = {$matricula}
        and ce.inicio >= date('{$inicio}')
        and ce.fim  <= date('{$fim}')
        order by ce.inicio";

        return DB::connection('mysql_sbahq')->select($sql);

    }

    public function getDadosLogbook($matricula, $indicadorME){

        $sql = "
        select * from (
            select
            sa.ID as id,
            sa.CET as cet,
            cc.HOSPSEDE as hospsede,
            sa.Matricula as matricula,
            (select date(min(cm.DT_INICIAL)) as DT_INICIAL from sbahq.CET_ME cm where MATRICULAMEMBRO = {$matricula} and cm.IND_ME = (select DISTINCT cm.IND_ME from sbahq.CET_ME cm where cm.MATRICULAMEMBRO = {$matricula} and sa.DATA BETWEEN cm.DT_INICIAL and cm.DT_FIM )) as dt_inicio_me,
            (select	date(max(cm.DT_FIM)) as DT_FIM from sbahq.CET_ME cm where MATRICULAMEMBRO = {$matricula} and cm.IND_ME = (select DISTINCT cm.IND_ME from sbahq.CET_ME cm where cm.MATRICULAMEMBRO = {$matricula} and sa.DATA BETWEEN cm.DT_INICIAL and cm.DT_FIM )) as dt_fim_me,
            (select DISTINCT cm.IND_ME from sbahq.CET_ME cm where cm.MATRICULAMEMBRO = {$matricula} and sa.DATA BETWEEN cm.DT_INICIAL and cm.DT_FIM ) as ind_me,
            sa.Hospital as codigo_hospital,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.Hospital ) as hospital,
            sa.DATA as data_procedimento,
            sa.HORA as codigo_hora,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.HORA ) as hora_procedimento,
            sa.idade as codigo_idade,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.idade ) as idade,
            sa.Sexo as codigo_genero,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.Sexo ) as genero,
            sa.ASA as codigo_asa,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.ASA ) as asa,
            sa.Reg_Intern as codigo_regime_internacao,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.Reg_Intern ) as regime_internacao,
            sa.Reg_at as codigo_regime_atendimento,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.Reg_at ) as regime_atendimento,
            sa.ESPEC as codigo_especialidade,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.ESPEC ) as especialidade,
            sa.porte as codigo_porte,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.porte ) as porte,
            sa.tec as codigo_tecnica,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.tec ) as tecnica,
            sa.duracao,
            sa.visita_pa as codigo_visita_paciente,
            sa.id_paciente,(select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.visita_pa ) as visita_paciente,
            sa.morbidade as codigo_comorbidade,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.morbidade ) as comorbidade,
            sa.procedimento,
            sa.observacao,
            sa.drogas,
            sa.tecnicaAnest as codigo_tecnica_anestesia,
            (select SGAP_CODIGOS.procedimento from SGAP.SGAP_CODIGOS where code = sa.tecnicaAnest ) as tecnica_anestesia,
            sa.Registro as registro,
            sa.app
            from
            SGAP.SGAP_ANESTESIAS sa join sbahq.CET_CET cc 
            on sa.CET = cc.MATRICULA 
            where
            sa.Matricula = {$matricula}
        ) t
        where
            (select DISTINCT cm.IND_ME from sbahq.CET_ME cm where cm.MATRICULAMEMBRO = {$matricula} and t.data_procedimento BETWEEN cm.DT_INICIAL and cm.DT_FIM ) = $indicadorME
        order by t.data_procedimento limit 5
        ";

        $dadosLogbook = DB::connection('mysql_sbahq')->select($sql);
        return $dadosLogbook;

    }

}