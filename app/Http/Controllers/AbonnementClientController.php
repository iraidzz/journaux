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

        $client = DB::table('users')->where('id','=', $id)->get();
        $publi = DB::table('publications')->get();

        return View::make('ajoutabonnementclient')->with('client', $client)->with('publi',$publi);
    }

//$dateString = $sabonner['date_fin'];
//$dt = new DateTime($dateString);
//$dt->modify('+1 year');
//$data = array(
//'id_abonnement' => $sabonner['id_abonnement'],
//'date_fin' => $dt,
//);
    public function AjoutAbonnementClient(Request $request)
    {
        $post = $request->all();
        $v=\Validator::make($request->all(),
            [
                'client_id'=>'required',
                'magazine'=>'required',
                'date'=>'required',
                'etat'=>'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {

            $dateString = $post['date'];
            $dt = new DateTime($dateString);
            $dt->modify('+1 year');

            $data = array(
                'client_id'=>$post['client_id'],
                'publication_id'=>$post['magazine'],
                'date_debut'=>$post['date'],
                'date_fin'=>$dt,
                'date_pause'=>null,
                'etat'=>$post['etat'],
            );
            $i=DB::table('abonnements')->insert($data);
            if($i>0)
            {
                return redirect("client/".$post['client_id']);
            }
        }
    }

//$table->increments('id');
//$table->integer('client_id');
//$table->integer('publication_id');
//$table->date('date_debut');
//$table->date('date_fin');
//$table->date('date_pause');
//$table->integer('etat');



    public function ArretAboEnCours($id,$idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_fin'=>date('Y-m-d'),'etat' => 3]);


        $client = DB::table('users')->where('id','=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=',$idclient);
        $abo = \App\abonnement::all()->where('client_id', '=',$idclient)->sortBy('id');
        return View::make('editclient')->with('client', $client)->with('histo',$histo)->with('abo',$abo);
    }
    public function PauseAboEnCours($id,$idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_pause'=>date('Y-m-d'),'etat' => 2]);

        $client = DB::table('users')->where('id','=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=',$idclient);
        $abo = \App\abonnement::all()->where('client_id', '=',$idclient)->sortBy('id');
        return View::make('editclient')->with('client', $client)->with('histo',$histo)->with('abo',$abo);
    }
    public function RedemarrerAboEnPause($id,$idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_pause'=>date('Y-m-d'),'etat' => 1]);

        $client = DB::table('users')->where('id','=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=',$idclient);
        $abo = \App\abonnement::all()->where('client_id', '=',$idclient)->sortBy('id');
        return View::make('editclient')->with('client', $client)->with('histo',$histo)->with('abo',$abo);
    }
    public function ArreterAboEnPause($id,$idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_fin'=>date('Y-m-d'),'etat' => 3]);

        $client = DB::table('users')->where('id','=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=',$idclient);
        $abo = \App\abonnement::all()->where('client_id', '=',$idclient)->sortBy('id');
        return View::make('editclient')->with('client', $client)->with('histo',$histo)->with('abo',$abo);
    }
    public function RedemarrerAboStopper($id,$idclient)
    {
        DB::table('abonnements')
            ->where('id', $id)
            ->update(['date_pause'=>date('Y-m-d'),'etat' => 1]);

        $client = DB::table('users')->where('id','=', $idclient)->get();
        $histo = \App\historique::all()->where('user_id', '=',$idclient);
        $abo = \App\abonnement::all()->where('client_id', '=',$idclient)->sortBy('id');
        return View::make('editclient')->with('client', $client)->with('histo',$histo)->with('abo',$abo);
    }

}