<?php

namespace App\Helpers;

use Exception;

class AppConstantes
{
    // Produção
    // public $DB_HOST_SBAHQ = 'node27904-env-2751216.jelastic.saveincloud.net';
    // public $DB_PORT_SBAHQ = '3306';  
    // public $DB_DATABASE_SBAHQ = 'sbahq';
    // public $DB_USERNAME_SBAHQ = 'root';
    // public $DB_PASSWORD_SBAHQ = 'FKGskt52481';

    // Homolog
    public $DB_HOST_SBAHQ = 'node54502-bdg-clone080920.jelastic.saveincloud.net';
    public $DB_PORT_SBAHQ = '3306';  
    public $DB_DATABASE_SBAHQ = 'sbahq';
    public $DB_USERNAME_SBAHQ = 'root';
    public $DB_PASSWORD_SBAHQ = 'bntYPeXmJO';

    public $URL_API = 'http://sga-api-homolog.jelastic.saveincloud.net/public/api/';
    public $TOKEN_API = 'api_token_bF173DB760764A90662819416B74b3ec';

    public $URL_API_PROPOSTA = 'https://propostacet.sbahq.org/api/';

    public static function instance()
    {
        return new AppConstantes();
    }

}