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
        if (request()->has('cid')) {
            $data = array(
                'type' => request('type'),
                'amount' => request('amount'),
                'transaction' => request('transaction'),
                'abonnement_id' => request('cid'),
                'statut' => 1,
            );
            $i = DB::table('paiements')->insert($data);
            if ($i > 0) {
                return response()->json('Code vert', 200);
            } else {
                return response()->json('Code vert', 400);
            }
        } else {
            return response()->json('Code vert', 500);

        }

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

            DB::table('paiements')
                ->where('abonnement_id', $cid)
                ->update(['clientid' => $clientid]);


            $panier = abonnement::with('publication')->where('client_id', '=', $clientid)->where('paye', '=', 0)->where('etat', '=', 1)->get();


            return response()->json(array(
                'error' => false,
                'result' => $panier,
                'status_code' => 200
            ));

        } else {
            echo "a faire woulah";
        }

    }


    public function Remboursement($payeid, $clientid)
    {

        $paiement = DB::table('paiements')->where('id', $payeid)->get();
//dd($paiement);

        $uuid = "97a53bb0-c73b-06c4-df5a-136dd6f8deec";
        foreach ($paiement as $patate) {
            $transaction = $patate->transaction;
        }

        $url = "http://10.0.0.6:6543/cardpay/$uuid/$transaction";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        $content = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($content == 200) {

            $i = DB::table('paiements')
                ->where('id', $payeid)
                ->update(['statut' => 0]);
            if ($i > 0) {
                return redirect("/client/$clientid");
            }else
            {
                echo "Problème dans l'update des données sur abonnements";
            }
        }elseif ($content == 400)
        {
            echo "Remboursement déjà effectué ou un des paramètres est incorrect";
        }


    }


    public function DisplayRetardPaiement()
    {
        $abo = \App\abonnement::all()->where('paye', '=', '0');

        return View::make('paiementretard')->with('paiement', $abo);
    }


}