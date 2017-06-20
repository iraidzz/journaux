<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 20/06/2017
 * Time: 10:30
 */

namespace App;
use App\Client;
use App\Employe;

class Historique
{


    public function client()
    {
        return $this->hasOne('App\Client', 'foreign_key');
    }

    public function employe()
    {
        return $this->hasOne('App\Employe', 'foreign_key');
    }

}