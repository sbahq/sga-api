<?php

namespace App\Domains\Repositories;

use App\Domains\Models\Socio;
use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

class SocioRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new Socio();
        $this->validate = new Validation();
    }

    private function returnArraySocio($socio){
        return array(
            'id_pessoa' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->id_pessoa),
            'matricula' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->matricula),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->nome),
            'categoria' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->categoria),
            'regional' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->regional),
            'nome_profissional' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->nome_profissional),
            'sexo' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->sexo),
            'data_nascimento' => \App\Helpers\AppHelper::instance()->formatDate($socio->data_nascimento),
            'data_cadastro' => \App\Helpers\AppHelper::instance()->formatDate($socio->data_cadastro),
            'data_inicio' => \App\Helpers\AppHelper::instance()->formatDate($socio->data_inicio),
            'data_termino' => \App\Helpers\AppHelper::instance()->formatDate($socio->data_termino),
            'celular' => \App\Helpers\AppHelper::instance()->leftOnlyNumber( \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->celular) ),
            'telefone' => \App\Helpers\AppHelper::instance()->leftOnlyNumber( \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->telefone) ),
            'email' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->email),
            'pais' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->pais),
            'cep' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->cep),
            'estado' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->estado),
            'cidade' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->cidade),
            'bairro' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->bairro),
            'rua' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->rua),
            'complemento' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->complemento),
            'cpf' => \App\Helpers\AppHelper::instance()->leftOnlyNumber($socio->cpf),
            'rg' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->rg),
            'orgao_emissor_rg' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->orgao_emissor_rg),
            'titulo_eleitor' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->titulo_eleitor),
            'crm' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->crm),
            'estado_crm' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->estado_crm),
        );
    }

    private function returnArraySocioStatus($socio){
        return array(
            'matricula' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->matricula),
            'nome' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->nome),
            'categoria' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->categoria),
            'categoria_descricao' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->categoria_descricao),
            'regional' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->regional),
            'nome_profissional' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->nome_profissional),
            'sexo' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->sexo),
            'celular' => \App\Helpers\AppHelper::instance()->leftOnlyNumber( \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->celular) ),
            'email' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->email),
            'pais' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->pais),
            'cep' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->cep),
            'estado' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->estado),
            'cidade' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->cidade),
            'bairro' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->bairro),
            'rua' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->rua),
            'complemento' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->complemento),
            'cpf' => \App\Helpers\AppHelper::instance()->leftOnlyNumber($socio->cpf),
            'crm' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->crm),
            'estado_crm' => \App\Helpers\AppHelper::instance()->isEmpetyOrNull($socio->estado_crm),
        );
    }

    public function getSociosEmDia($field, $value){

        $socios = $this->model->getSociosEmDia($field, $value);
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;

    }

    public function getUsuarioByMatricula($matricula){

        $socios = $this->model->getUsuarioByMatricula( strtolower( $matricula ));
        $response = [];
        $return = [];

        if( count($socios) > 0 ){

            foreach($socios as $socio){
                array_push($return, array(
                    'id_pessoa'     => $socio->ID_PESSOA,
                    'nome'          => $socio->NOME,
                    'categoria'     => $socio->CATEGORIA,
                    'regional'      => $socio->REGIONAL,
                    'email'         => $socio->EMAIL,
                    'matricula'     => $socio->MATRICULA,
                    'cpf'           => $socio->CPF
                ));
            }

            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getSocioByEmail($email){
        $socios = $this->model->getSocioByEmail( strtolower( $email ));
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getSocioByName($nome){
        $socios = $this->model->getSocioByName( strtolower( $nome ));
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getSocioByMatricula($matricula){
        $socios = $this->model->getSocioByMatricula( strtolower( $matricula ));
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function autenticarSocio($user, $password){
        $socios = $this->model->autenticarSocio( $user, $password);
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                $s = (Array)$socio;
                array_push($return, Array(
                    'id_pessoa' => $s['id_pessoa'],
                    'nome' => $s['nome'],
                    'categoria' => $s['categoria'],
                    'regional'      => $s['regional'],
                    'email' => $s['email'],
                    'matricula' => $s['matricula'],
                    'cpf' => $s['cpf'],
                    'data_nascimento' => $s['data_nascimento']
                ));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getAllSociosEmDia(){
        $socios = $this->model->getAllSociosEmDia();
        $response = [];
        $return = [];
        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getAnuidadeSocio($cpf){
        $socios = $this->model->getAnuidadeSocio($cpf);
        $response = [];
        $return = [];
        if( count($socios) > 0 ){
            foreach($socios as $socio){

                if( strlen(trim($socio->valor)) == 0 ) throw new CustomException('Prezado(a) '. $socio->nome .' ,seu boleto não foi gerado, favor entrar em contato com a SBA.');
                if( strlen(trim($socio->matricula)) == 0 ) throw new CustomException('Prezado(a) '. $socio->nome .' ,seu boleto não foi gerado, favor entrar em contato com a SBA.');
                if( strtotime(date('Y-m-d')) > strtotime($socio->data_vencimento) ) throw new CustomException('O prazo para pagamento da anuidade expirou, Favor entrar em contato com a SBA clicando no botão abaixo, selecionando o assunto anuidade.');

                array_push($return, array(
                    'id' => $socio->id,
                    'nome' => $socio->nome,
                    'data_geracao' => $socio->data_geracao,
                    'matricula' => $socio->matricula,
                    'valor' => $socio->valor,
                    'valor_formatado' => 'R$ ' .$socio->valor . ',00',
                    'data_vencimento' => $socio->data_vencimento
                ));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function saveBoletosItau( array $data ){
        return $this->model->saveBoletosItau($data);
    }

    public function getAssociadoCPF($cpf){
        $socios = $this->model->getAssociadoCPF($cpf);
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getAssociadoCPFStatus($cpf){

        $socios = $this->model->getAssociadoCPF($cpf);
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            $error = false;
            $messageErro = '';
            foreach($socios as $socio){

                if( $socio->anuidade_sba_vencida_status == 1 ){
                    $error = true;
                    $messageErro = 'Sua anuidade junto a SBA encontrasse atrasada, favor regularizar sua situação';
                }

                if( $socio->anuidade_regional_vencida_status == 1 ){
                    $error = true;
                    if( $messageErro == '' ) $messageErro = 'Sua anuidade junto a Regional ' . $socio->regional . ' encontrasse atrasada, favor regularizar sua situação';
                    else {
                        $messageErro = 'Suas anuidades junto a Regional ' . $socio->regional . ' e a SBA encontram-se em atraso, favor regularizar sua situação.';
                    }
                }
                if(!$error) array_push($return, $this->returnArraySocioStatus($socio));

            }
            if(!$error){
                $response = $this->validate->getSuccessMessage();
                $response['items'] = $return;
            } else {
                $message = ['message' => $messageErro];
                $response = $this->validate->getErrorMessage( $message );
            }

        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage( $message );
        }
        return $response;
    }

    public function getAssociadoEmail($email){
        $socios = $this->model->getAssociadoEmail($email);
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getPessoaCPF($cpf){
        $socios = $this->model->getPessoaCPF($cpf);
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function getPessoaSecret3CPF($cpf){
        $socios = $this->model->getPessoaSecret3CPF($cpf);
        $response = [];
        $return = [];

        if( count($socios) > 0 ){
            foreach($socios as $socio){
                array_push($return, $this->returnArraySocio($socio));
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $return;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

}
