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
        //XXXXXX
    }

    public function enregistrer(Request $request)
    {

        $ch = curl_init();

        $data = [];
        $data['user']['name'] = $request->only('name')['name'];
        $data['user']['email'] = $request->only('email')['email'];
        $data['user']['password'] = $request->only('password')['password'];
        $data['user']['prenom'] = $request->only('prenom')['prenom'];
        $data['user']['civilite'] = $request->only('civilite')['civilite'];
        $data['user']['numero_telephone'] = $request->only('numero_telephone')['numero_telephone'];
        $data['user']['date_naissance'] = $request->only('date_naissance')['date_naissance'];
        $data['user']['lieu_naissance'] = $request->only('lieu_naissance')['lieu_naissance'];
        $data['user']['adresse_domicile'] = $request->only('adresse_domicile')['adresse_domicile'];
        $data['user']['postal_domicile'] = $request->only('postal_domicile')['postal_domicile'];
        $data['user']['ville_domicile'] = $request->only('ville_domicile')['ville_domicile'];

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // exécution de la session : $content est le retour de l'api
        $content = json_decode(curl_exec($ch), true);
        // fermeture de la session
        curl_close($ch);



//        $post = $request->all();
//        $v = \Validator::make($request->all(),
//            [
//                'name' => 'required',
//                'email' => 'required',
//                'password' => 'required',
//                'prenom' => 'required',
//                'civilite' => 'required',
//                'numero_telephone' => 'required',
//                'date_naissance' => 'required',
//                'lieu_naissance' => 'required',
//                'adresse_domicile' => 'required',
//                'postal_domicile' => 'required',
//                'ville_domicile' => 'required',
//            ]);
//        if ($v->fails())
//        {
//            return redirect()->back()->withErrors($v->errors());
//        }
//        else
//        {
//            $ch = curl_init();
//
//            $data = [];
//            $data['user']['name'] = $request->only('name')['name'];
//            $data['user']['email'] = $request->only('email')['email'];
//            $data['user']['password'] = $request->only('password')['password'];
//            $data['user']['prenom'] = $request->only('prenom')['prenom'];
//            $data['user']['civilite'] = $request->only('civilite')['civilite'];
//            $data['user']['numero_telephone'] = $request->only('numero_telephone')['numero_telephone'];
//            $data['user']['date_naissance'] = $request->only('date_naissance')['date_naissance'];
//            $data['user']['lieu_naissance'] = $request->only('lieu_naissance')['lieu_naissance'];
//            $data['user']['adresse_domicile'] = $request->only('adresse_domicile')['adresse_domicile'];
//            $data['user']['postal_domicile'] = $request->only('postal_domicile')['postal_domicile'];
//            $data['user']['ville_domicile'] = $request->only('ville_domicile')['ville_domicile'];
//
//            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//
//            // exécution de la session : $content est le retour de l'api
//            $content = json_decode(curl_exec($ch), true);
//            // fermeture de la session
//            curl_close($ch);
//        }
    }
}