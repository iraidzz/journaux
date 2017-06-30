<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','prenom','civilite','numero_telephone','date_naissance','lieu_naissance','adresse_domicile','postal_domicile','ville_domicile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function historique()
    {
        return $this ->hasMany('\App\historique');
    }

    public function abonnement()
    {
        return $this ->hasMany('\App\abonnement');
    }

}
