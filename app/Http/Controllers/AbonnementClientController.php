<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 04/07/2017
 * Time: 09:10
 */

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AbonnementClientController
{

    public function DisplayAjouterAbonnementClient($id)
    {

        $client = DB::table('users')->where('id', '=', $id)->get();
        $publi = DB::table('publications')->get();

        return View::make('ajoutabonnementclient')->with('client', $client)->with('publi', $publi);
    }

    public function AjoutAbonnementClient(Request $request)
    {
        $post = $request->all();
        $v = \Validator::make($request->all(),
            [
                'client_id' => 'required',
                'magazine' => 'required',
                'date' => 'required',
                'etat' => 'required',
            ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {

            $dateString = $post['date'];
            $dt = new DateTime($dateString);
            $dt->modify('+1 year');

            $getprix = DB::table('publications')->where('id', "=", $post['magazine'])->get();

foreach($getprix as $prix)
{
 $prixfinal = $prix->prix_annuel;
}

            $data = array(
                'client_id' => $post['client_id'],
                'publication_id' => $post['magazine'],
                'prix' => $prixfinal,
                'date_debut' => $post['date'],
                'date_fin' => $dt,
                'date_pause' => null,
                'etat' => $post['etat'],
            );
            $i = DB::table('abonnements')->insert($data);
            if ($i > 0) {
                return redirect("client/" . $post['client_id']);
            }
        }
    }


    public function ArretAboEnCours($id, $idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_fin' => date('Y-m-d'), 'etat' => 3]);


        $client = DB::table('users')->where('id', '=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=', $idclient);
        $abo = \App\abonnement::all()->where('client_id', '=', $idclient)->sortBy('id');
        $paiement = \App\paiement::all()->where('clientid', '=', $idclient);
        return View::make('editclient')->with('client', $client)->with('histo', $histo)->with('abo', $abo)->with('paiement',$paiement);
    }

    public function PauseAboEnCours($id, $idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_pause' => date('Y-m-d'), 'etat' => 2]);

        $client = DB::table('users')->where('id', '=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=', $idclient);
        $abo = \App\abonnement::all()->where('client_id', '=', $idclient)->sortBy('id');
        $paiement = \App\paiement::all()->where('clientid', '=', $idclient);
        return View::make('editclient')->with('client', $client)->with('histo', $histo)->with('abo', $abo)->with('paiement',$paiement);
    }

    public function RedemarrerAboEnPause($id, $idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_pause' => date('Y-m-d'), 'etat' => 1]);

        $client = DB::table('users')->where('id', '=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=', $idclient);
        $abo = \App\abonnement::all()->where('client_id', '=', $idclient)->sortBy('id');
        $paiement = \App\paiement::all()->where('clientid', '=', $idclient);
        return View::make('editclient')->with('client', $client)->with('histo', $histo)->with('abo', $abo)->with('paiement',$paiement);
    }

    public function ArreterAboEnPause($id, $idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_fin' => date('Y-m-d'), 'etat' => 3]);

        $client = DB::table('users')->where('id', '=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=', $idclient);
        $abo = \App\abonnement::all()->where('client_id', '=', $idclient)->sortBy('id');
        $paiement = \App\paiement::all()->where('clientid', '=', $idclient);
        return View::make('editclient')->with('client', $client)->with('histo', $histo)->with('abo', $abo)->with('paiement',$paiement);
    }

    public function RedemarrerAboStopper($id, $idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_pause' => date('Y-m-d'), 'etat' => 1]);

        $client = DB::table('users')->where('id', '=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=', $idclient);
        $abo = \App\abonnement::all()->where('client_id', '=', $idclient)->sortBy('id');
        $paiement = \App\paiement::all()->where('clientid', '=', $idclient);
        return View::make('editclient')->with('client', $client)->with('histo', $histo)->with('abo', $abo)->with('paiement',$paiement);
    }

}