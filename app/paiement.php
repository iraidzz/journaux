<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    protected $fillable = [
        'type', 'amount', 'transaction','cid','statut'
    ];
}
