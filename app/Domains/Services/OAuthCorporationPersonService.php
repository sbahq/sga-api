<?php

namespace App\Domains\Services;

use App\Domains\Repositories\OAuthCorporationPersonRepository;


class OAuthCorporationPersonService extends Service
{
    public function __construct()
    {
        $this->repository = new OAuthCorporationPersonRepository();
    }

    public function authentication($request){
        return $this->repository->authentication($request);
    }

}
