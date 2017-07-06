<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 04/07/2017
 * Time: 15:11
 */

namespace App\Http\Controllers;

use App\abonnement;
use App\paiement;
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

//        if (request()->has('cid') && request()->has('transaction') && request()->has('amount')) {
//            $paiement = paiement::find(request('cid'));
//            if ($paiement) {
//                $paiement->type = request('type');
//                $paiement->amount = request('amount');
//                $paiement->transaction = request('transaction');
//                $paiement->cid = request('cid');
//                $paiement->status = 1;
//                $paiement->save();
//                return response()->json('OK', 200);
//            } else {
//                return response()->json('KO', 405);
//            }
//        } else {
//            return response()->json('KO', 401);
//        }

return response()->json('CODE VERT','200');

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

//            http://10.0.0.6:6543/cardpay/97a53bb0-c73b-06c4-df5a-136dd6f8deec/JournauxEnfolie/1234567890/10/2018/500
            $url = "http://10.0.0.6:6543/cardpay/$uuid/$cid/$cardnumber/$cardmonth/$cardyear/$amount";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            $content = curl_getinfo($ch, CURLINFO_HTTP_CODE);
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