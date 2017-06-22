<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class HistoriqueClientController extends Controller
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
    public function DisplayHistorique()
    {

        $historique = \App\historique::all();
        //$historique = DB::table('historiques')->get();

        // var_dump($historique);
        // exit();
        return View::make('historiqueclient')->with('historique', $historique);

    }
}
