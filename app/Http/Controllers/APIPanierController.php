<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 04/07/2017
 * Time: 15:11
 */

namespace App\Http\Controllers;
use App\abonnement;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class APIPanierController
{

    public function DisplayPanier($id)
    {

$panier = abonnement::with('publication')->where('client_id', '=', $id)->where('paye', '=', 0)->get();
        return response()->json(array(
            'error' => false,
            'result' => $panier,
            'status_code' => 200
        ));
    }

}