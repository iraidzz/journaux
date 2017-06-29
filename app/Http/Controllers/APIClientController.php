<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 26/06/2017
 * Time: 10:43
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function authentifier()
    {
        $usersdata = DB::table('users')->where('email','=', request('user')['email'])->get();
        if(Auth::attempt(['email' => request('user')['email'], 'password' => request('user')['password']]))
        {
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'result' => $usersdata
                )
            );
        }else
        {
            return response()->json(array(
                'error' => true,
                'status_code' => 401));
        }
    }

    public function enregistrer()
    {


        $mobilUser = request('user');
        $email = $mobilUser['email'];
        $data = [];
        $user = User::whereEmail($email)->first();
        if ($user) {
            return response()->json(array(
                'error' => true,
                'status_code' => 401
            ));
        } else {
            User::create([
                'name' => $mobilUser['name'],
                'email' => $mobilUser['email'],
                'password' => bcrypt($mobilUser['password']),
                'prenom' => $mobilUser['prenom'],
                'civilite' => $mobilUser['civilite'],
                'numero_telephone' => $mobilUser['numero_telephone'],
                'date_naissance' => $mobilUser['date_naissance'],
                'lieu_naissance' => $mobilUser['lieu_naissance'],
                'adresse_domicile' => $mobilUser['adresse_domicile'],
                'postal_domicile' => $mobilUser['postal_domicile'],
                'ville_domicile' => $mobilUser['ville_domicile'],
            ])['id'];

            return response()->json(array(
                'error' => false,
                'status_code' => 200
            ));
        }
    }
}