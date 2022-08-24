<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = array(
            array(
                'name' => 'Aspirante',
                'key' => 'ASP',
            ),
            array(
                'name' => 'Ativo',
                'key' => 'ATV',
            ),
            array(
                'name' => 'Remido',
                'key' => 'REM',
            ),
            array(
                'name' => 'Benemerito',
                'key' => 'BEN',
            ),
            array(
                'name' => 'Honorário',
                'key' => 'HON',
            ),
            array(
                'name' => 'Estrangeiro',
                'key' => 'EST',
            ),
            array(
                'name' => 'Adjunto',
                'key' => 'ADJ',
            ),
            array(
                'name' => 'Aspirante-Adjunto',
                'key' => 'AAD',
            ),
            array(
                'name' => 'Especial',
                'key' => 'ESP',
            ),            
        );

        foreach($categories as $key => $category){
            DB::table('categories_membership')->insert([
                'name' => $category['name'],
                'key' => $category['key'],
                'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

    }
}
