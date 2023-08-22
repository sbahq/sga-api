<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Socio extends Model
{

    private $sqlSocios = "
        SELECT * FROM (
        SELECT
        PESSOA.ID_PESSOA AS id_pessoa,
        PESSOA.NOME      AS nome,
        SECRET2.CATEGORIA as categoria,
        SECRET2.REG as regional,
        PESSOA.EMAIL     AS email,
        PESSOA.CELULAR as celular,
        PESSOA.TELEFONE1 as telefone,
        SECRET2.MATRICULA as matricula,
        PESSOA.CPF as cpf,
        PESSOA.IDENTIDADE as rg,
        PESSOA.ORGAOE as orgao_emissor_rg,
        PESSOA.TITULO as titulo_eleitor,
        SECRET2.NOME_PROF as nome_profissional,
        SECRET2.SEXO as sexo,
        SECRET2.NASCI as data_nascimento,
        SECRET2.CRM as crm,
        SECRET2.EST_CRM as estado_crm,
        SECRET2.DATA_CADASTRO as data_cadastro,
        SECRET2.DT_INICIO as data_inicio,
        SECRET2.DT_TERMINO as data_termino,
        PESSOA.LOCALIDADE as rua,
        PESSOA.BAIRRO as bairro,
        PESSOA.COMPLEMENT as complemento,
        PESSOA.CIDADE as cidade,
        PESSOA.ESTADO as estado,
        PESSOA.PAIS as pais,
        PESSOA.CEP as cep
        FROM
        SOCIOS RIGHT JOIN PESSOA ON PESSOA.id_pessoa = SOCIOS.id_pessoa
        INNER JOIN SECRET2 on SECRET2.id_pessoa = PESSOA.id_pessoa 
        ) as consulta ";

        private $sqlBoleto = "
        select
        PESSOA.NOME as nome,
        SER_BOLETO.GERADO as data_geracao,
        SER_BOLETO.id,
        SER_BOLETO.MATRICULA as matricula,
        SER_BOLETO.VALOR as valor,
        SER_BOLETO.VENCIMENTO as data_vencimento
        from 
        PESSOA left join SER_ANUIDADEMB
        ON PESSOA.ID_PESSOA = SER_ANUIDADEMB.ID_PESSOA left join SER_BOLETO
        on SER_BOLETO.MATRICULA = SER_ANUIDADEMB.MATRICULA left JOIN SECRET2
        on PESSOA.ID_PESSOA = SECRET2.ID_PESSOA
        where 1 = 1 ";


    public function getSociosEmDia($paramField, $value){
        $field = 'consulta.'.$paramField;
        $where = '';
        if(strtolower($field) == 'cpf'){
            $cpf = str_replace('-','', str_replace('.','',$value));
            $where = " where ((replace(replace($field,'.',''),'-','') = '{$cpf}') or ($field = '{$value}')) ";
        } else {
            $where = " where {$field} = '{$value}' ";
        }
        $sql = $this->sqlSocios .$where;
        $socios = DB::connection('mysql_sbahq')->select($sql);
        return $socios;
    }

    public function getUsuarioByMatricula($matricula){

        $sql = "select * from vw_socios_em_dia vsed where lower(vsed.MATRICULA) = '{$matricula}'";
        $socios = DB::connection('mysql_sbahq')->select($sql);
        return $socios;
    }

    public function getAllSociosEmDia(){
        $socios = DB::connection('mysql_sbahq')->select($this->sqlSocios . ' limit 1');
        return $socios;
    }

    public function getSocioByEmail($email){

        $where = "where lower(consulta.email) = '{$email}'";
        $sql = $this->sqlSocios .$where;
        $socios = DB::connection('mysql_sbahq')->select($sql);
        return $socios;
    }

    public function getSocioByName($nome){
        $where = "where lower(consulta.nome) like lower('%{$nome}%')";
        $sql = $this->sqlSocios .$where;
        $sql.= " order by consulta.nome";
        $socios = DB::connection('mysql_sbahq')->select($sql);
        return $socios;
    }

    public function getSocioByMatricula($matricula){
        $where = "where consulta.matricula = '{$matricula}'";
        $sql = $this->sqlSocios .$where;
        $socios = DB::connection('mysql_sbahq')->select($sql);
        return $socios;
    }

    public function autenticarSocio($user, $password){
        $sql = "select
        vsed.ID_PESSOA as id_pessoa,
        vsed.NOME as nome,
        vsed.CATEGORIA as categoria,
        vsed.EMAIL as email,
        vsed.MATRICULA as matricula,
        vsed.CPF as cpf,
        vsed.REGIONAL as regional,
        vsed.NASCI as data_nascimento
        from vw_socios_em_dia vsed
        where vsed.USUARIO = '{$user}'
        and (SENHA_ORIGINAL = '{$password}' or SENHA_ALTERADA = '{$password}')";
        $socios = DB::connection('mysql_sbahq')->select($sql);
        return $socios;
    }

    public function getAnuidadeSocio( $cpf ){
        $where = '';
        $where.= " and SER_ANUIDADEMB.ANO_SBA < " . date('Y');
        $where.= " and PESSOA.CPF = '{$cpf}' ";
        $sql = $this->sqlBoleto . $where;
        $socios = DB::connection('mysql_sbahq')->select( $sql );
        return $socios;
    }

    public function saveBoletosItau( array $data ){

        return DB::connection('mysql_sbahq')->table('BOLETOS_ITAU')->insert([
            'NOME'              => $data['nome'],
            'TIPO'              => $data['tipo'],
            'TIPO_PROVA_TSA'    => $data['tipo_prova_tsa'],
            'VALOR'             => $data['valor'],
            'DATA'              => date('Y-m-d H:i:s'),
            'MATRICULA'         => $data['matricula'],
            'CPF'               => $data['cpf']
        ]);

    }

    public function getAssociadoCPF($cpf){
        $sql = "select * from vw_associados va where va.cpf = '{$cpf}'";
        $associado = DB::connection('mysql_sbahq')->select( $sql );
        return $associado;
    }

    public function getAssociadoEmail($email){
        $sql = "select * from vw_associados va where va.email = '{$email}'";
        $associado = DB::connection('mysql_sbahq')->select( $sql );
        return $associado;
    }
    
    public function getPessoaCPF($cpf){
        $sql = "
            select 
            p.ID_PESSOA as id_pessoa, 
            p.NOME as nome,
            s.CATEGORIA as categoria,
            null as regional,
            null     AS email,
            null as celular,
            null as telefone,
            null as matricula,
            null as cpf,
            null as rg,
            null as orgao_emissor_rg,
            null as titulo_eleitor,
            null as nome_profissional,
            null as sexo,
            null as data_nascimento,
            null as crm,
            null as estado_crm,
            null as data_cadastro,
            null as data_inicio,
            null as data_termino,
            null as rua,
            null as bairro,
            null as complemento,
            null as cidade,
            null as estado,
            null as pais,
            null as cep
            from PESSOA p left join SECRET2 s on p.ID_PESSOA = s.ID_PESSOA where p.CPF = '{$cpf}'";
        $pessoa = DB::connection('mysql_sbahq')->select( $sql );
        return $pessoa;
    }

    public function getPessoaSecret3CPF($cpf){
        $sql = "
            select 
            p.ID_PESSOA as id_pessoa, 
            p.NOME as nome,
            p.CATEGORIA as categoria,
            null as regional,
            null     AS email,
            null as celular,
            null as telefone,
            p.MATRICULA as matricula,
            null as cpf,
            null as rg,
            null as orgao_emissor_rg,
            null as titulo_eleitor,
            null as nome_profissional,
            null as sexo,
            null as data_nascimento,
            null as crm,
            null as estado_crm,
            null as data_cadastro,
            null as data_inicio,
            null as data_termino,
            null as rua,
            null as bairro,
            null as complemento,
            null as cidade,
            null as estado,
            null as pais,
            null as cep
            from SECRET3 p where p.CPF = '{$cpf}'";
        $pessoa = DB::connection('mysql_sbahq')->select( $sql );
        return $pessoa;
    }

}
