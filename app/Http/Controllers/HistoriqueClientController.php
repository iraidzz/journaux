<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class HistoriqueClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Formulaire d'ajout d'historique au niveau global
    public function formulaireAjoutHistoriqueGlobal()
    {
        $client = DB::table('users')->orderBy('id')->where('prenom','!=', '')->get();
        return View::make('ajouthistoriqueglobal')->with('client', $client);
    }


    // Validation du Formulaire d'ajout d'historique au niveau global
    public function ajouterHistoriqueGlobal()
    {
        // XXXXXXXXXXXX
    }


    public function DisplayHistorique()
    {

        $historique = \App\historique::all();
        return View::make('historiqueclient')->with('historique', $historique);

    }
}
