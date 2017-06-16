<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\View;

class ListemagazineController extends Controller
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
        return view('listemagazine');
    }

    public function afficher()
    {
        $publication = DB::table('publication')->get();
        return View::make('listemagazine')->with('publication', $publication);
    }
}
