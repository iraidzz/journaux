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

class APIMagazineController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function lister()
    {
        $publications = DB::table('publications')->get();
        return response()->json(array(
            'error' => false,
            'result' => $publications,
            'status_code' => 200
        ));

    }

    public function filtrer()
    {
        $filtrer = request()->all();
        $letitre = $filtrer['titre'];
        //dd($letitre);
        $publications = DB::table('publications')->where('titre', '=', $letitre)->get();
        return response()->json(array(
            'error' => false,
            'result' => $publications,
            'status_code' => 200
        ));

    }


    public function detail(Request $request)
    {
        $input = $request->all();
        $publications = DB::table('publications')->where('id', $input['id'])->get();

        /*
        $est_abonnee = false;
        if (array_key_exists('token', $input))
        {
            $user = JWTAuth::toUser($input['token']);
            $abo = AbonnementServices::getAbonnement($input['id'], $user->id);
            if ($abo) {
                $est_abonnee = true;
            }
        }
        */
        return response()->json(array(
            'error' => false,
            'result' => $publications,
            'status_code' => 200
        ));
    }
}