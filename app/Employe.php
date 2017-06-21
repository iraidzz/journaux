<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    public function historique()
    {
        return $this ->hasMany('\App\historique');
    }
}
