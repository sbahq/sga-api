<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
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
                'name' => 'Sociedade Brasileira de Anestesiologia',
                'person_type_id' => 2,
                'corporation_person' => Array(
                    'fantasy_name' => 'SBA'
                )
            ),
        );
        foreach($itens as $item){

            $personId = DB::table('persons')->insertGetId([
                'name' => $item['name'],
                'person_type_id' => $item['person_type_id'],
                'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if( $item['person_type_id'] == 1 ){
                
                DB::table('individual_persons')->insert([
                    'birthday' => '1979-01-25',
                    'gender' => 'M',
                    'person_id' => $personId,
                    'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
    
            } else {
                $corporationPersonId = DB::table('corporation_persons')->insertGetId([
                    'fantasy_name' => $item['corporation_person']['fantasy_name'],
                    'person_id' => $personId,
                    'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                if( $personId == 1 ){

                    $options = [
                        'cost' => 12,
                    ];

                    $token = 'api_token_' . \App\Helpers\AppHelper::instance()->generateToken();
                    DB::table('oauth_corporation_person')->insert([
                        'corporation_person_id' => $corporationPersonId,
                        'system_id' => 1,
                        'api_token' => password_hash( $token, PASSWORD_BCRYPT, $options),
                        'open_token' => $token,
                        'active' => true,
                        'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);

                    // $token = 'api_token_' . \App\Helpers\AppHelper::instance()->generateToken();
                    // DB::table('oauth_corporation_person')->insert([
                    //     'corporation_person_id' => $corporationPersonId,
                    //     'system_id' => 2,
                    //     'api_token' => password_hash( $token, PASSWORD_BCRYPT, $options),
                    //     'open_token' => $token,
                    //     'active' => true,
                    //     'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                    //     'created_at' => date('Y-m-d H:i:s'),
                    // ]);

                    // $token = 'api_token_' . \App\Helpers\AppHelper::instance()->generateToken();
                    // DB::table('oauth_corporation_person')->insert([
                    //     'corporation_person_id' => $corporationPersonId,
                    //     'system_id' => 3,
                    //     'api_token' => password_hash( $token, PASSWORD_BCRYPT, $options),
                    //     'open_token' => $token,
                    //     'active' => true,
                    //     'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                    //     'created_at' => date('Y-m-d H:i:s'),
                    // ]);

                    // $token = 'api_token_' . \App\Helpers\AppHelper::instance()->generateToken();
                    // DB::table('oauth_corporation_person')->insert([
                    //     'corporation_person_id' => $corporationPersonId,
                    //     'system_id' => 4,
                    //     'api_token' => password_hash( $token, PASSWORD_BCRYPT, $options),
                    //     'open_token' => $token,
                    //     'active' => true,
                    //     'guid' => \App\Helpers\AppHelper::instance()->generateGUID(),
                    //     'created_at' => date('Y-m-d H:i:s'),
                    // ]);
                }
            }
        }
    }
}