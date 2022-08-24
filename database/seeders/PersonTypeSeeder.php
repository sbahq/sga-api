<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonTypeSeeder extends Seeder
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
                'name' => 'Pessoa Física',
                'alias' => 'individual',
                'description' => 'Pessoa física'
            ),
            array(
                'name' => 'Pessoa Jurídica',
                'alias' => 'corporation',
                'description' => 'Pessoa Jurídica'
            ),
        );

        foreach($itens as $item){
            DB::table('persons_types')->insert([
                'name' => $item['name'],
                'alias' => $item['alias'],
                'description' => $item['description'],
                'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

    }
}
