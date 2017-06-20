<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 20/06/2017
 * Time: 10:30
 */

namespace App;


class Historique
{


    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }

}