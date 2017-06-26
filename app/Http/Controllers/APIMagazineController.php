<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 26/06/2017
 * Time: 10:43
 */

namespace App\Http\Controllers;


use App\publication;

class APIMagazineController
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

    public function index()
    {
        return view('publication');
    }

    public function lister(Request $request)
    {
        $pubs = publications::All();
        return response()->json(array(
            'error' => false,
            'result' => $pubs,
            'status_code' => 200
        ));

    }

//    public function detail(Request $request)
//    {
//        $input = $request->all();
//        $pubs = Publication::where('id', $input['id'])->get();
//
//        $est_abonnee = false;
//        if (array_key_exists('token', $input)) {
//            $user = JWTAuth::toUser($input['token']);
//            $abo = AbonnementServices::getAbonnement($input['id'], $user->id);
//            if ($abo) {
//                $est_abonnee = true;
//            }
//        }
//        return response()->json(array(
//            'error' => false,
//            'result' => $pubs,
//            'user_est_abonnee' => $est_abonnee,
//            'status_code' => 200
//        ));
//    }
}