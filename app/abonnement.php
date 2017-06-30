<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class abonnement extends Model
{
    //
    protected $fillable = [
        'client_id', 'publication_id', 'date_debut','date_fin'
    ];

    public function client()
    {
        return $this->belongsTo('\App\User');
    }

    public function publication()
    {
        return $this->belongsTo('\App\User');
    }


}
