<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 26/06/2017
 * Time: 10:43
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class APIClientController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function authentifier(Request $request)
    {
        $publications = DB::table('publications')->get();
        return response()->json(array(
            'error' => false,
            'result' => $publications,
            'status_code' => 200
        ));

    }

    public function enregistrer(Request $request)
    {
        $post = $request->all();
        $v = \Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'prenom' => 'required',
                'civilite' => 'required',
                'numero_telephone' => 'required',
                'date_naissance' => 'required',
                'lieu_naissance' => 'required',
                'adresse_domicile' => 'required',
                'postal_domicile' => 'required',
                'ville_domicile' => 'required',
            ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {

            $data = array(
                'titre' => $post['titre'],
                'nombre_numero' => $post['nombre_numero'],
                'photo_couverture' => $dataUri,
                'description' => $post['description'],
                'prix_annuel' => $post['prix_annuel'],
            );
            $i = DB::table('publications')->insert($data);
            if ($i > 0) {
                \Session::flash('message', 'Publication ajoutée !');
                return redirect('listemagazine');
            }
        }
    }
}