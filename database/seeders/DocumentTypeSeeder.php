<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $itens = array(
            array(
                'name' => 'Cadastro de Pessoa Física',
                'abbreviated' => 'CPF',
                'description' => null,
                'active' => TRUE,
                'required' => TRUE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Cadastro Nacional de Pessoa Jurídica',
                'abbreviated' => 'CNPJ',
                'description' => null,
                'active' => TRUE,
                'required' => TRUE,
                'person_type_id' => 2
            ),
            array(
                'name' => 'Carteira de Identidade',
                'abbreviated' => 'RG',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1

            ),
            array(
                'name' => 'Carteira de Trabalho e Previdência Social',
                'abbreviated' => 'CTPS',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Carteira Nacional de Habilitação',
                'abbreviated' => 'CNH',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Certificado de Alistamento Militar',
                'abbreviated' => 'CAM',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Documento Nacional de Identidade',
                'abbreviated' => 'DNI',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Conselho Regional de Medicina',
                'abbreviated' => 'CRM',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Identidade para pessoas estrangeiras',
                'abbreviated' => 'IPE',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Passaporte',
                'abbreviated' => 'PA',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),
            array(
                'name' => 'Título de Eleitor',
                'abbreviated' => 'TE',
                'description' => null,
                'active' => TRUE,
                'required' => FALSE,
                'person_type_id' => 1
            ),

        );

        foreach ($itens as $item) {
            DB::table('documents_types')->insert([
                'name' => $item['name'],
                'abbreviated' => $item['abbreviated'],
                'active' => $item['active'],
                'required' => $item['required'],
                'person_type_id' => $item['person_type_id'],
                'description' => $item['description'],
                'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
