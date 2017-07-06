<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    protected $fillable = [
        'type', 'amount', 'transaction','cid','statut'
    ];

    public function abonnement()
    {
        return $this->belongsTo('\App\abonnement');
    }

}
