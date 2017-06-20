<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 20/06/2017
 * Time: 11:20
 */

namespace App;
use App\Historique;

class Employe
{

    public function historique()
    {
        return $this ->hasMany('App\Historique');
    }

}