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

$panier = abonnement::with('publication')->where('client_id', '=', $id)->where('paye', '=', 0)->where('etat', '=', 1)->get();
        return response()->json(array(
            'error' => false,
            'result' => $panier,
            'status_code' => 200
        ));
    }

    public function Paiement()
    {

    $info = request()->all();

        $uuid = $info['uuid'];
        $cid = $info['cid'];
        $cardnumber = $info['cardnumber'];
        $cardmonth = $info['cardmonth'];
        $cardyear = $info['cardyear'];
        $amount = $info['amount'];

//        URL : /cardpay/uuid/cid/cardnumber/cardmonth/cardyear/amount

        $ch = curl_init();
        $url = "http://10.0.0.6/cardpay/uuid/cid/cardnumber/cardmonth/cardyear/amount";
        // configuration des options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"uuid=$uuid&cid=$cid&cardnumber=$cardnumber&cardmonth=$cardmonth&cardyear=$cardyear&amount=$amount");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        $content =curl_exec($ch);

        dd($content);
        curl_close($ch);




//        $mobilUser = request()->all();
//        $update = User::find($mobilUser['id']);
//        $update->name = $mobilUser['name'];
//        $update->email = $mobilUser['email'];
//        $update->password = bcrypt($mobilUser['password']);
//        $update->prenom = $mobilUser['prenom'];
//        $update->civilite = $mobilUser['civilite'];
//        $update->numero_telephone = $mobilUser['numero_telephone'];
//        $update->date_naissance = $mobilUser['date_naissance'];
//        $update->lieu_naissance = $mobilUser['lieu_naissance'];
//        $update->adresse_domicile = $mobilUser['adresse_domicile'];
//        $update->postal_domicile = $mobilUser['postal_domicile'];
//        $update->ville_domicile = $mobilUser['ville_domicile'];
//        $update->save();
//        $compteinfo = DB::table('users')->where('id', '=', $mobilUser['id'])->get();
//        return response()->json(array(
//            'error' => false,
//            'result' => $compteinfo,
//            'status_code' => 200
//        ));
    }

}