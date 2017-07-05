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

    public function RetourPaiement()
    {


        $mobilUser = request()->all();
       $type = $mobilUser['type'];
       $amount = $mobilUser['amount'];
       $transaction = $mobilUser['transaction'];
       $cid = $mobilUser['cid'];

        return response()->json(array(
            'error' => false,
            'status_code' => 200
        ));
    }

    public function Paiement()
    {

    $info = request()->all();

        $uuid = $info['uuid']; //pas de restriction cote esipay
        $cid = $info['cid']; //pas de restriction cote esipay
        $cardnumber = $info['cardnumber']; //10 chiffres
        $cardmonth = $info['cardmonth']; //pas de restriction cote esipay
        $cardyear = $info['cardyear']; //pas de restriction cote esipay
        $amount = $info['amount']; //pas de restriction cote esipay

        $url = "http://10.0.0.6:6543/cardpay/$uuid/$cid/$cardnumber/$cardmonth/$cardyear/$amount";
//        $url = "http://journaux.dev/api/client/panier/$id";
dd($url);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        $content = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);

        return response()->json(array(
            'error' => false,
            'status_code' => 200
        ));

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