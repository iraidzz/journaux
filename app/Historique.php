<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class historique extends Model
{
    public function client()
    {
        return $this->belongsTo('\App\client');
    }

    public function employe()
    {
        return $this->belongsTo('\App\employe');
    }
}
