<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 01/05/2018
 * Time: 11:23
 */

namespace App\Manager;

use PDO;

class Connexion
{
    //connexion à la base de donnée
    public function connect()
    {
        $credientials = $this->getCredentials();

        return new PDO($credientials['dsn'],$credientials['user'], $credientials['pwd']);

    }

    public function getCredentials()
    {
        return require APP_ROOT.'/config.php';
    }
}
