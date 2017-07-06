<?php

namespace App\Http\Controllers;

use App\paiement;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GestionClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = DB::table('users')->orderBy('id')->where('prenom', '!=', '')->where('supprimer', '=', false)->get();
        return View::make('gestionclient')->with('client', $client);
    }

    public function DisplayEditClient($id)
    {

        $client = DB::table('users')->where('id', '=', $id)->get();

        $histo = \App\historique::all()->where('user_id', '=', $id);

        $abo = \App\abonnement::all()->where('client_id', '=', $id);

        $paiement = \App\paiement::all()->where('clientid', '=', $id);


        return View::make('editclient')->with('client', $client)->with('histo', $histo)->with('abo', $abo)->with('paiement', $paiement);

    }

    public function DeleteClient($id)
    {

//        DB::table('users')->where('id', '=', $id)->delete();
        DB::table('users')
            ->where('id', $id)
            ->update(['supprimer' => true]);

        $client = DB::table('users')->orderBy('id')->where('prenom', '!=', '')->where('supprimer', '=', false)->get();
        return View::make('gestionclient')->with('client', $client);

    }


    public function EditClient(Request $request)
    {


        $post = $request->all();
        DB::table('users')
            ->where('id', $post['id'])
            ->update(['name' => $post['name'],
                'prenom' => $post['prenom'],
                'civilite' => $post['civilite'],
                'email' => $post['email'],
                'password' => bcrypt($post['password']),
                'numero_telephone' => $post['numero_telephone'],
                'date_naissance' => $post['date_naissance'],
                'lieu_naissance' => $post['lieu_naissance'],
                'adresse_domicile' => $post['adresse_domicile'],
                'postal_domicile' => $post['postal_domicile'],
                'ville_domicile' => $post['ville_domicile']]);

        $client = DB::table('users')->orderBy('id')->where('prenom', '!=', '')->where('supprimer', '=', false)->get();
        return View::make('gestionclient')->with('client', $client);

    }


    public function FiltreClient(Request $request)
    {
        $post = $request->all();
        $laValeurRecherchee = $post['name'];

        if ($laValeurRecherchee == '') {
            $client = DB::table('users')->orderBy('id')->where('prenom', '!=', '')->where('supprimer', '=', false)->get();
            return View::make('gestionclient')->with('client', $client);
        } else {
            $client = DB::table('users')->where('name', '=', $laValeurRecherchee)->where('supprimer', '=', false)->get();
            return View::make('gestionclient')->with('client', $client);
        }
    }


}
