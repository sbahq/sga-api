<?php

namespace App\Domains\Repositories;

use App\Domains\Models\OAuthCorporationPerson;

class OAuthCorporationPersonRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new OAuthCorporationPerson();
    }

    public function authentication($request){

        $token = trim( request()->header('x-token') );
        if( is_null( $token ) || $token == '' )
            $token = trim( request()->header('token') );

        $corporationToken = $this->findBy('open_token', $token);
        if( isset( $corporationToken['items'] ) ){
            return password_verify($token, $corporationToken['items'][0]['api_token']);
        } else {
            return false;
        }

    }

}
