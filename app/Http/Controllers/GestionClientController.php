<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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

        $client = DB::table('client')->get();
        return View::make('gestionclient')->with('client', $client);

        //$client = \App\client::all();
        //return View::make('gestionclient')->with('client', $client);

    }
}
