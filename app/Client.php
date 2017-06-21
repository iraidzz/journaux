<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    public function historique()
    {
        return $this ->hasMany('\App\historique');
    }
}
