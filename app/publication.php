<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publication extends Model
{

    public function abonnement()
    {
        return $this ->hasMany('\App\abonnement');
    }

}
