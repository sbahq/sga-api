<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $systems = array(
            array(
                'name' => 'Vagas CET',
                'abbreviated' => 'Vagas CET',
                'description' => 'Sistema que controla as vagas no CET',
                'url' => 'http://vagas.sbahq.org'
            ),
        );

        foreach($systems as $key => $system){
            DB::table('systems')->insert([
                'name' => $system['name'],
                'abbreviated' => $system['abbreviated'],
                'description' => $system['description'],
                'url' => $system['url'],
                'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

    }
}
