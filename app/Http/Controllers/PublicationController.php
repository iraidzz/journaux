<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PublicationController extends Controller
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
        return view('publication');
    }

    public function ajouterPublication(Request $request)
    {
        $post = $request->all();
        $v=\Validator::make($request->all(),
            [
                'titre'=>'required',
                'nombre_numero'=>'required',
                'photo_couverture'=>'required',
                'description'=>'required',
                'prix_annuel'=>'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'titre'=>$post['titre'],
                'nombre_numero'=>$post['nombre_numero'],
                'photo_couverture'=>$post['photo_couverture'],
                'description'=>$post['description'],
                'prix_annuel'=>$post['prix_annuel'],
            );
            $i=DB::table('publication')->insert($data);
            if($i>0)
            {
                \Session::flash('message','Publication ajoutée !');
                return redirect('publication');
            }
        }
    }

    public function afficher()
    {
        $publication=Publication::paginate(3);
        return view::make('publication')->with('publication',$publication);
    }


}
