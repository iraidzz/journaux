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
    public function ajouterHistoriqueGlobal(Request $request)
    {
        $post = $request->all();
        $v=\Validator::make($request->all(),
            [
                'client_id'=>'required',
                'employe_id'=>'required',
                'type_communication'=>'required',
                'date'=>'required',
                'commentaire'=>'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            foreach($post['client_id'] as $valeur)
            {
                //affichage des valeurs sélectionnées
                $data = array(
                    'user_id'=>$valeur,
                    'user_employe_id'=>$post['employe_id'],
                    'type_communication'=>$post['type_communication'],
                    'date'=>$post['date'],
                    'commentaire'=>$post['commentaire'],
                );
                $i=DB::table('historiques')->insert($data);
            }

            if($i>0)
            {
                return redirect('historiqueclient');
            }
        }
    }


    public function DisplayHistorique()
    {

        $historique = \App\historique::all();
        return View::make('historiqueclient')->with('historique', $historique);

    }

    public function DisplayAjouterHistoriqueClient($id)
    {
        $historique = DB::table('users')->where('id','=', $id)->get();
        return View::make('ajouthistoriqueclient')->with('historique', $historique);
    }

    public function AjoutHistoriqueClient(Request $request)
    {
        $post = $request->all();
        $v=\Validator::make($request->all(),
            [
                'client_id'=>'required',
                'employe_id'=>'required',
                'type_communication'=>'required',
                'date'=>'required',
                'commentaire'=>'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'user_id'=>$post['client_id'],
                'user_employe_id'=>$post['employe_id'],
                'type_communication'=>$post['type_communication'],
                'date'=>$post['date'],
                'commentaire'=>$post['commentaire'],
            );
            $i=DB::table('historiques')->insert($data);
            if($i>0)
            {
                return redirect("client/".$post['client_id']);
            }
        }
    }



}
