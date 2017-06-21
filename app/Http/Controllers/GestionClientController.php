<?php

namespace App\Http\Controllers;
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

        $client = DB::table('clients')->get();
        return View::make('gestionclient')->with('client', $client);

    }

    public function DisplayEditClient($id)
    {

        $client = DB::table('clients')->where('id','=', $id)->get();
        $histo = DB::table('historiques')->where('client_id','=', $id)->get();

        return View::make('editclient')->with('client', $client)->with('histo',$histo);

    }

    public function DeleteClient($id)
    {

        DB::table('clients')->where('id','=', $id)->delete();

        $client = DB::table('clients')->get();
        return View::make('gestionclient')->with('client', $client);

    }


    public function EditClient(Request $request)
    {


        $post = $request->all();
        DB::table('clients')
            ->where('id', $post['id'])
            ->update(['nom' => $post['nom'],
                'prenom' => $post['prenom'] ,
                'civilite' => $post['civilite'] ,
                'email' => $post['email'] ,
                'password' => $post['password'] ,
                'numero_telephone' => $post['numero_telephone'] ,
                'date_naissance' => $post['date_naissance'] ,
                'lieu_naissance' => $post['lieu_naissance'] ,
                'adresse_domicile' => $post['adresse_domicile'] ,
                'postal_domicile' => $post['postal_domicile'] ,
                'ville_domicile' => $post['ville_domicile']]);

        $client = DB::table('clients')->get();
        return View::make('gestionclient')->with('client', $client);



/*
        $post = $request->all();
        $v=\Validator::make($request->all(),
            [
                'civilite'=>'required',
                'nom'=>'required',
                'prenom'=>'required',
                'email'=>'required',
                'password'=>'required',
                'numero_telephone'=>'required',
                'date_naissance'=>'required',
                'lieu_naissance'=>'required',
                'adresse_domicile'=>'required',
                'postal_domicile'=>'required',
                'ville_domicile'=>'required',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'civilite'=>$post['civilite'],
                'nom'=>$post['nom'],
                'prenom'=>$post['prenom'],
                'email'=>$post['email'],
                'password'=>$post['password'],
                'numero_telephone'=>$post['numero_telephone'],
                'date_naissance'=>$post['date_naissance'],
                'lieu_naissance'=>$post['lieu_naissance'],
                'adresse_domicile'=>$post['adresse_domicile'],
                'postal_domicile'=>$post['postal_domicile'],
                'ville_domicile'=>$post['ville_domicile'],
            );
            $i=DB::table('clients')->update($data);
            if($i>0)
            {
                \Session::flash('message','Client modifié !');
                return redirect('gestionclient');
            }
        }
        */
    }




}
