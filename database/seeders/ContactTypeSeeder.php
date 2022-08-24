<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTypeSeeder extends Seeder
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
                'name' => 'Email',
                'description' => 'Cadastro de email',
                'required' => TRUE
            ),
            array(
                'name' => 'Telefone',
                'description' => 'Cadastro de telefone',
                'required' => FALSE
            ),
            array(
                'name' => 'Celular',
                'description' => 'Cadastro de celular',
                'required' => TRUE
            ),
        );

        foreach($itens as $item){
            DB::table('contacts_types')->insert([
                'name' => $item['name'],
                'description' => $item['description'],
                'required' => $item['required'],
                'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

    }
}
