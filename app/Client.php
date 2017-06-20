<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 16/06/2017
 * Time: 13:55
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Historique;

class Client extends Model
{



public function historique()
{
    return $this ->hasMany('App\Historique');
}



}