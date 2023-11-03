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


    public function getResponsaveisCertificadoSaidaAno($ano){

        $sql = "
        SELECT
        p.ID_PESSOA AS id_pessoa,
        s.MATRICULA AS matricula,
        p.NOME AS nome,
        s.NOME_PROF AS nome_profissional,
        s.NAC_ESTRANGEIRA AS estrangeiro,
        'PRESIDENTE' AS cargo,
        'COM.DE ENSINO E TREINAMENTO' AS orgao,
        587 AS id_cargo,
        s.SEXO AS sexo,
        (case
        when (s.SEXO = 'F') then 'Dra.'
        when (s.SEXO = 'M') then 'Dr.'
        else 'Dr(a).'
        end) AS tratamento,
        (case
        when (s.SEXO = 'F') then 'Prezada'
        when (s.SEXO = 'M') then 'Prezado'
        else 'Prezado(a)'
        end) AS prezado,
        (case
        when (s.SEXO = 'F') then 'a'
        when (s.SEXO = 'M') then 'o'
        else 'o(a)'
        end) AS artigo,
        p.CPF AS cpf,
        p.EMAIL AS email,
        p.CELULAR AS celular,
        p.TELEFONE1 AS telefone1,
        p.TELEFONE2 AS telefone2,
        cast(s.NASCI as date) AS data_nascimento,
        s.EST_CRM AS uf_crm,
        s.CRM AS crm,
        s.CATEGORIA AS categoria,
        (case
        when (s.CATEGORIA = 'ASP') then 'Aspirante'
        when (s.CATEGORIA = 'ATV') then 'Ativo'
        when (s.CATEGORIA = 'REM') then 'Remido'
        when (s.CATEGORIA = 'BEN') then 'Benemerito'
        when (s.CATEGORIA = 'HON') then 'Honorário'
        when (s.CATEGORIA = 'EST') then 'Estrangeiro'
        when (s.CATEGORIA = 'ADJ') then 'Adjunto'
        when (s.CATEGORIA = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATEGORIA = 'Especial') then 'Aspirante'
        else ''
        end) AS categoria_nome,
        s.CATANT AS categoria_anterior_1,
        (case
        when (s.CATANT = 'ASP') then 'Aspirante'
        when (s.CATANT = 'ATV') then 'Ativo'
        when (s.CATANT = 'REM') then 'Remido'
        when (s.CATANT = 'BEN') then 'Benemerito'
        when (s.CATANT = 'HON') then 'Honorário'
        when (s.CATANT = 'EST') then 'Estrangeiro'
        when (s.CATANT = 'ADJ') then 'Adjunto'
        when (s.CATANT = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_1_nome,
        s.CATANT2 AS categoria_anterior_2,
        (case
        when (s.CATANT2 = 'ASP') then 'Aspirante'
        when (s.CATANT2 = 'ATV') then 'Ativo'
        when (s.CATANT2 = 'REM') then 'Remido'
        when (s.CATANT2 = 'BEN') then 'Benemerito'
        when (s.CATANT2 = 'HON') then 'Honorário'
        when (s.CATANT2 = 'EST') then 'Estrangeiro'
        when (s.CATANT2 = 'ADJ') then 'Adjunto'
        when (s.CATANT2 = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT2 = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_2_nome,
        s.SITUACAO AS situacao,
        s.FACULDADE AS faculdade,
        s.ANOF AS ano_formatura,
        s.LOCAL_TRAB AS local_trabalho,
        s.UF_TRAB AS uf_local_trabalho,
        s.CIDADE_TRAB AS cidade_local_trabalho,
        p.PAIS AS pais,
        p.ESTADO AS uf,
        p.CIDADE AS municipio,
        p.LOCALIDADE AS endereco,
        p.COMPLEMENT AS complemento,
        p.BAIRRO AS bairro,
        p.CXPOSTAL AS caixa_postal,
        p.CEP AS cep
        FROM
        SDC_MB sm INNER JOIN SECRET2 s
        ON sm.MATRICULA = s.MATRICULA INNER JOIN PESSOA p 
        ON s.ID_PESSOA = p.ID_PESSOA INNER JOIN SDC_TIPO st
        ON sm.ID_TIPO = st.ID_TIPO
        WHERE
        st.ID_TIPO = 57
        and year(sm.DT_1VIA) = {$ano}
        union
        SELECT
        p.ID_PESSOA AS id_pessoa,
        s.MATRICULA AS matricula,
        p.NOME AS nome,
        s.NOME_PROF AS nome_profissional,
        s.NAC_ESTRANGEIRA AS estrangeiro,
        'VICE-DIRETOR DEP. CIENTÍFICO' AS cargo,
        'SBA - DIRETORIA' AS orgao,
        4455 AS id_cargo,
        s.SEXO AS sexo,
        (case
        when (s.SEXO = 'F') then 'Dra.'
        when (s.SEXO = 'M') then 'Dr.'
        else 'Dr(a).'
        end) AS tratamento,
        (case
        when (s.SEXO = 'F') then 'Prezada'
        when (s.SEXO = 'M') then 'Prezado'
        else 'Prezado(a)'
        end) AS prezado,
        (case
        when (s.SEXO = 'F') then 'a'
        when (s.SEXO = 'M') then 'o'
        else 'o(a)'
        end) AS artigo,
        p.CPF AS cpf,
        p.EMAIL AS email,
        p.CELULAR AS celular,
        p.TELEFONE1 AS telefone1,
        p.TELEFONE2 AS telefone2,
        cast(s.NASCI as date) AS data_nascimento,
        s.EST_CRM AS uf_crm,
        s.CRM AS crm,
        s.CATEGORIA AS categoria,
        (case
        when (s.CATEGORIA = 'ASP') then 'Aspirante'
        when (s.CATEGORIA = 'ATV') then 'Ativo'
        when (s.CATEGORIA = 'REM') then 'Remido'
        when (s.CATEGORIA = 'BEN') then 'Benemerito'
        when (s.CATEGORIA = 'HON') then 'Honorário'
        when (s.CATEGORIA = 'EST') then 'Estrangeiro'
        when (s.CATEGORIA = 'ADJ') then 'Adjunto'
        when (s.CATEGORIA = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATEGORIA = 'Especial') then 'Aspirante'
        else ''
        end) AS categoria_nome,
        s.CATANT AS categoria_anterior_1,
        (case
        when (s.CATANT = 'ASP') then 'Aspirante'
        when (s.CATANT = 'ATV') then 'Ativo'
        when (s.CATANT = 'REM') then 'Remido'
        when (s.CATANT = 'BEN') then 'Benemerito'
        when (s.CATANT = 'HON') then 'Honorário'
        when (s.CATANT = 'EST') then 'Estrangeiro'
        when (s.CATANT = 'ADJ') then 'Adjunto'
        when (s.CATANT = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_1_nome,
        s.CATANT2 AS categoria_anterior_2,
        (case
        when (s.CATANT2 = 'ASP') then 'Aspirante'
        when (s.CATANT2 = 'ATV') then 'Ativo'
        when (s.CATANT2 = 'REM') then 'Remido'
        when (s.CATANT2 = 'BEN') then 'Benemerito'
        when (s.CATANT2 = 'HON') then 'Honorário'
        when (s.CATANT2 = 'EST') then 'Estrangeiro'
        when (s.CATANT2 = 'ADJ') then 'Adjunto'
        when (s.CATANT2 = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT2 = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_2_nome,
        s.SITUACAO AS situacao,
        s.FACULDADE AS faculdade,
        s.ANOF AS ano_formatura,
        s.LOCAL_TRAB AS local_trabalho,
        s.UF_TRAB AS uf_local_trabalho,
        s.CIDADE_TRAB AS cidade_local_trabalho,
        p.PAIS AS pais,
        p.ESTADO AS uf,
        p.CIDADE AS municipio,
        p.LOCALIDADE AS endereco,
        p.COMPLEMENT AS complemento,
        p.BAIRRO AS bairro,
        p.CXPOSTAL AS caixa_postal,
        p.CEP AS cep
        FROM
        SDC_MB sm INNER JOIN SECRET2 s
        ON sm.MATRICULA = s.MATRICULA INNER JOIN PESSOA p 
        ON s.ID_PESSOA = p.ID_PESSOA INNER JOIN SDC_TIPO st
        ON sm.ID_TIPO = st.ID_TIPO
        WHERE
        st.ID_TIPO = 228
        and year(sm.DT_1VIA) = {$ano}
        union
        SELECT
        p.ID_PESSOA AS id_pessoa,
        s.MATRICULA AS matricula,
        p.NOME AS nome,
        s.NOME_PROF AS nome_profissional,
        s.NAC_ESTRANGEIRA AS estrangeiro,
        'DIRETOR DEP. CIENTÍFICO' AS cargo,
        'SBA - DIRETORIA' AS orgao,
        2521 AS id_cargo,
        s.SEXO AS sexo,
        (case
        when (s.SEXO = 'F') then 'Dra.'
        when (s.SEXO = 'M') then 'Dr.'
        else 'Dr(a).'
        end) AS tratamento,
        (case
        when (s.SEXO = 'F') then 'Prezada'
        when (s.SEXO = 'M') then 'Prezado'
        else 'Prezado(a)'
        end) AS prezado,
        (case
        when (s.SEXO = 'F') then 'a'
        when (s.SEXO = 'M') then 'o'
        else 'o(a)'
        end) AS artigo,
        p.CPF AS cpf,
        p.EMAIL AS email,
        p.CELULAR AS celular,
        p.TELEFONE1 AS telefone1,
        p.TELEFONE2 AS telefone2,
        cast(s.NASCI as date) AS data_nascimento,
        s.EST_CRM AS uf_crm,
        s.CRM AS crm,
        s.CATEGORIA AS categoria,
        (case
        when (s.CATEGORIA = 'ASP') then 'Aspirante'
        when (s.CATEGORIA = 'ATV') then 'Ativo'
        when (s.CATEGORIA = 'REM') then 'Remido'
        when (s.CATEGORIA = 'BEN') then 'Benemerito'
        when (s.CATEGORIA = 'HON') then 'Honorário'
        when (s.CATEGORIA = 'EST') then 'Estrangeiro'
        when (s.CATEGORIA = 'ADJ') then 'Adjunto'
        when (s.CATEGORIA = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATEGORIA = 'Especial') then 'Aspirante'
        else ''
        end) AS categoria_nome,
        s.CATANT AS categoria_anterior_1,
        (case
        when (s.CATANT = 'ASP') then 'Aspirante'
        when (s.CATANT = 'ATV') then 'Ativo'
        when (s.CATANT = 'REM') then 'Remido'
        when (s.CATANT = 'BEN') then 'Benemerito'
        when (s.CATANT = 'HON') then 'Honorário'
        when (s.CATANT = 'EST') then 'Estrangeiro'
        when (s.CATANT = 'ADJ') then 'Adjunto'
        when (s.CATANT = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_1_nome,
        s.CATANT2 AS categoria_anterior_2,
        (case
        when (s.CATANT2 = 'ASP') then 'Aspirante'
        when (s.CATANT2 = 'ATV') then 'Ativo'
        when (s.CATANT2 = 'REM') then 'Remido'
        when (s.CATANT2 = 'BEN') then 'Benemerito'
        when (s.CATANT2 = 'HON') then 'Honorário'
        when (s.CATANT2 = 'EST') then 'Estrangeiro'
        when (s.CATANT2 = 'ADJ') then 'Adjunto'
        when (s.CATANT2 = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT2 = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_2_nome,
        s.SITUACAO AS situacao,
        s.FACULDADE AS faculdade,
        s.ANOF AS ano_formatura,
        s.LOCAL_TRAB AS local_trabalho,
        s.UF_TRAB AS uf_local_trabalho,
        s.CIDADE_TRAB AS cidade_local_trabalho,
        p.PAIS AS pais,
        p.ESTADO AS uf,
        p.CIDADE AS municipio,
        p.LOCALIDADE AS endereco,
        p.COMPLEMENT AS complemento,
        p.BAIRRO AS bairro,
        p.CXPOSTAL AS caixa_postal,
        p.CEP AS cep
        FROM
        SDC_MB sm INNER JOIN SECRET2 s
        ON sm.MATRICULA = s.MATRICULA INNER JOIN PESSOA p 
        ON s.ID_PESSOA = p.ID_PESSOA INNER JOIN SDC_TIPO st
        ON sm.ID_TIPO = st.ID_TIPO
        WHERE
        st.ID_TIPO = 51
        and year(sm.DT_1VIA) = {$ano}
        union
        SELECT
        p.ID_PESSOA AS id_pessoa,
        s.MATRICULA AS matricula,
        p.NOME AS nome,
        s.NOME_PROF AS nome_profissional,
        s.NAC_ESTRANGEIRA AS estrangeiro,
        'PRESIDENTE' AS cargo,
        'SBA - DIRETORIA' AS orgao,
        574 AS id_cargo,
        s.SEXO AS sexo,
        (case
        when (s.SEXO = 'F') then 'Dra.'
        when (s.SEXO = 'M') then 'Dr.'
        else 'Dr(a).'
        end) AS tratamento,
        (case
        when (s.SEXO = 'F') then 'Prezada'
        when (s.SEXO = 'M') then 'Prezado'
        else 'Prezado(a)'
        end) AS prezado,
        (case
        when (s.SEXO = 'F') then 'a'
        when (s.SEXO = 'M') then 'o'
        else 'o(a)'
        end) AS artigo,
        p.CPF AS cpf,
        p.EMAIL AS email,
        p.CELULAR AS celular,
        p.TELEFONE1 AS telefone1,
        p.TELEFONE2 AS telefone2,
        cast(s.NASCI as date) AS data_nascimento,
        s.EST_CRM AS uf_crm,
        s.CRM AS crm,
        s.CATEGORIA AS categoria,
        (case
        when (s.CATEGORIA = 'ASP') then 'Aspirante'
        when (s.CATEGORIA = 'ATV') then 'Ativo'
        when (s.CATEGORIA = 'REM') then 'Remido'
        when (s.CATEGORIA = 'BEN') then 'Benemerito'
        when (s.CATEGORIA = 'HON') then 'Honorário'
        when (s.CATEGORIA = 'EST') then 'Estrangeiro'
        when (s.CATEGORIA = 'ADJ') then 'Adjunto'
        when (s.CATEGORIA = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATEGORIA = 'Especial') then 'Aspirante'
        else ''
        end) AS categoria_nome,
        s.CATANT AS categoria_anterior_1,
        (case
        when (s.CATANT = 'ASP') then 'Aspirante'
        when (s.CATANT = 'ATV') then 'Ativo'
        when (s.CATANT = 'REM') then 'Remido'
        when (s.CATANT = 'BEN') then 'Benemerito'
        when (s.CATANT = 'HON') then 'Honorário'
        when (s.CATANT = 'EST') then 'Estrangeiro'
        when (s.CATANT = 'ADJ') then 'Adjunto'
        when (s.CATANT = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_1_nome,
        s.CATANT2 AS categoria_anterior_2,
        (case
        when (s.CATANT2 = 'ASP') then 'Aspirante'
        when (s.CATANT2 = 'ATV') then 'Ativo'
        when (s.CATANT2 = 'REM') then 'Remido'
        when (s.CATANT2 = 'BEN') then 'Benemerito'
        when (s.CATANT2 = 'HON') then 'Honorário'
        when (s.CATANT2 = 'EST') then 'Estrangeiro'
        when (s.CATANT2 = 'ADJ') then 'Adjunto'
        when (s.CATANT2 = 'AAD') then 'Aspirante-Adjunto'
        when (s.CATANT2 = 'Especial') then 'Aspirante'
        else NULL
        end) AS categoria_anterior_2_nome,
        s.SITUACAO AS situacao,
        s.FACULDADE AS faculdade,
        s.ANOF AS ano_formatura,
        s.LOCAL_TRAB AS local_trabalho,
        s.UF_TRAB AS uf_local_trabalho,
        s.CIDADE_TRAB AS cidade_local_trabalho,
        p.PAIS AS pais,
        p.ESTADO AS uf,
        p.CIDADE AS municipio,
        p.LOCALIDADE AS endereco,
        p.COMPLEMENT AS complemento,
        p.BAIRRO AS bairro,
        p.CXPOSTAL AS caixa_postal,
        p.CEP AS cep
        FROM
        SDC_MB sm INNER JOIN SECRET2 s
        ON sm.MATRICULA = s.MATRICULA INNER JOIN PESSOA p 
        ON s.ID_PESSOA = p.ID_PESSOA INNER JOIN SDC_TIPO st
        ON sm.ID_TIPO = st.ID_TIPO
        WHERE
        st.ID_TIPO = 31
        and year(sm.DT_1VIA) = {$ano}
        ";

        $responsaveisCertificadoSaida = DB::connection('mysql_sbahq')->select($sql);
        return $responsaveisCertificadoSaida;
    }

}