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

    public static function instance()
    {
        return new AppConstantes();
    }

}