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

        //$comments = App\Post::find(1)->comments;
        //$historique = DB::table('historique')->get();
        $historique = \App\Historique::all();
        var_dump($historique);
        exit();
        return View::make('historiqueclient')->with('historique', $historique);

    }
}
