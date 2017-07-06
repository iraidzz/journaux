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
//        $cid = request('cid');
//        $user = User::whereCID($cid)->first();
//        if ($user) {
//            return response()->json('Code pas bon',401 );
//        } else {
//            paiement::create([
//                'type' => request('type'),
//                'amount' => request('amount'),
//                'transaction' => request('transaction'),
//                'cid' => request('cid'),
//                'statut' => 1,
//            ]);
//
//            return response()->json('Code vert', 200);
//        }
        return response()->json('Code vert', 200);

    }

    public function Paiement()
    {

        $info = request()->all();

        $clientid = $info['clientid']; //pas de restriction cote esipay
        $uuid = $info['uuid']; //pas de restriction cote esipay
        $cid = $info['cid']; //pas de restriction cote esipay
        $cardnumber = $info['cardnumber']; //10 chiffres
        $cardmonth = $info['cardmonth']; //pas de restriction cote esipay
        $cardyear = $info['cardyear']; //pas de restriction cote esipay
        $amount = $info['amount']; //pas de restriction cote esipay

        $url = "http://10.0.0.6:6543/cardpay/$uuid/$cid/$cardnumber/$cardmonth/$cardyear/$amount";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        $content = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($content == 200) {

            DB::table('abonnements')
                ->where('id', $cid)
                ->update(['paye' => 1]);

            $panier = abonnement::with('publication')->where('client_id', '=', $clientid)->where('paye', '=', 0)->where('etat', '=', 1)->get();

            return response()->json(array(
                'error' => false,
                'result' => $panier,
                'status_code' => 200
            ));

        } else {
            echo "a faire woulah";
        }

//        $compteinfo = DB::table('users')->where('id', '=', $mobilUser['id'])->get();
//        return response()->json(array(
//            'error' => false,
//            'result' => $compteinfo,
//            'status_code' => 200
//        ));
    }

}