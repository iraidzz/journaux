<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 26/06/2017
 * Time: 10:43
 */

namespace App\Http\Controllers;

use App\abonnement;
use App\User;
use DateTime;
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
    public function mesabonnements($id)
    {

        $mesabonnements = DB::table('abonnements')->where('client_id', '=', $id)->where('etat', '=', '1')->where('date_fin','>=', date('Y-m-d'))->get();
        return response()->json(array(
            'error' => false,
            'result' => $mesabonnements,
            'status_code' => 200
        ));
    }

    public function checkDejaAbonne($id) // Pour l'affichage des magazine, concernant le bouton grisé "déjà abonné"
    {

        $mesabonnements = DB::table('abonnements')->where('client_id', '=', $id)->where('etat', '=', '1')->get();
        return response()->json(array(
            'error' => false,
            'result' => $mesabonnements,
            'status_code' => 200
        ));
    }

    public function mesanciensabonnements($id)
    {
//        $mesabonnements = DB::table('abonnements')
//            ->where('client_id', '=', $id)
//            ->where('etat', '=', '3')
//            ->get();

        $mesabonnements = DB::table('abonnements')
            ->where('client_id', '=', $id)
            ->where('etat', '=', '3')
            ->orWhere(function($q) use ($id) {
                $q->where('date_fin','<=', date('Y-m-d'))
                    ->where('client_id', '=', $id);
            })
            ->get();

        return response()->json(array(
            'error' => false,
            'result' => $mesabonnements,
            'status_code' => 200
        ));

    }

    // On récupère les informations magazine pour lesquels le client s'est abonné
    public function lister()
    {
        $publications = DB::table('publications')->get();
        return response()->json(array(
            'error' => false,
            'result' => $publications,
            'status_code' => 200
        ));

    }
    // Quand on clique sur le bouton "s'abonner"


    public function renouvelerabonnement()
    {





        $sabonner = request()->all();

        //dd($sabonner);
        $dateString = $sabonner['date_fin'];
        $dt = new DateTime($dateString);
        $dt->modify('+1 year');
        $data = array(
            'id_abonnement' => $sabonner['id_abonnement'],
            'date_fin' => $dt,
        );

        /* On fait un test */
        if($sabonner['paye']=='1') /*Si l'abonnement à déjà été réglé par le client , on update la ligne pour une année supplémentaire avec pour prix le coût du magazine pour une année */
        {
            $prix = $sabonner['prixmagazineannuel'];

        }
        else /*Si l'abonnement n'a pas été payé la premiere fois , on update la ligne pour une année supplémentaire avec pour prix le coût du magazine pour une année ++++++ coût de l'année précédente */
        {
            $prix = $sabonner['prixmagazineannuel'] + $sabonner['coutabonnement'];
        }
        // Maintenant , on remet l'etat de paiement à 0, pour dire que le client doit régler cet abonnement
        $paye = '0';


        DB::table('abonnements')->where('id',$sabonner['id_abonnement'])
            ->update(['date_fin' => $dt,'etat' => '1','paye'=>$paye, 'prix'=>$prix]);

        /*
         *
        $abonnement=DB::table('abonnements')->where('id',$sabonner['id_abonnement'])->first();
        $abonnement->date_fin=$dt;
        $abonnement->etat=1;
        $abonnement->save();
         */


        /*

                // On +1 année  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $renouvelerabonnement = request()->all();

        $update = abonnement::find($renouvelerabonnement['id_abonnement']);
        $update->date_fin = $renouvelerabonnement['date_fin'];
        $update->save();


        $renewabo = DB::table('abonnements')->where('id', '=', '1')->get();


        return response()->json(array(
            'error' => false,
            'result' => $renewabo,
            'status_code' => 200
        ));

        */
    }

    public function relancerabonnementarrete()
    {
        $sabonner = request()->all();

        //dd($data);
        DB::table('abonnements')->where('id',$sabonner['id_abonnement'])
            ->update(['date_fin' => $sabonner['date_fin'],'etat' => '1']);

    }
    public function suspendreabonnement()
    {

        $suspendre = request()->all();

        $data = array(
            'id_abonnement' => $suspendre['id_abonnement'],
            'etat' => $suspendre['etat'],
        );

        DB::table('abonnements')->where('id',$suspendre['id_abonnement'])
            ->update(['etat' => $suspendre['etat']]);
    }
    public function sabonner()
    {
        // ----- C'EST ICI QUE DOIT SE PASSER L'INSERTION DU NOUVEL ABONNEMENT DANS LA BDD -----//

        $sabonner = request()->all();

        //dd($sabonner);
        $data = array(
            'client_id' => $sabonner['client_id'],
            'publication_id' => $sabonner['publication_id'],
            'prix' => $sabonner['prix'],
            'date_debut' => $sabonner['date_debut'],
            'date_fin' => $sabonner['date_fin'],
            'date_pause' => $sabonner['date_pause'],
            'etat' => '1',
            'paye' => '0',
        );
        //dd($data);
        DB::table('abonnements')->insert($data);
    }

    public function authentifier()
    {
        $usersdata = DB::table('users')->where('email', '=', request('user')['email'])->get();
        if (Auth::attempt(['email' => request('user')['email'], 'password' => request('user')['password']])) {
            return response()->json(array(
                    'error' => false,
                    'status_code' => 200,
                    'result' => $usersdata
                )
            );
        } else {
            return response()->json(array(
                'error' => true,
                'status_code' => 401,
                'result'=>'ErreurConnexion'));
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


    public function Display($id)
    {
        $compteinfo = DB::table('users')->where('id', '=', $id)->get();
        return response()->json(array(
            'error' => false,
            'result' => $compteinfo,
            'status_code' => 200
        ));
    }

    public function DisplayEditCompte($id)
    {
        $compteinfo = DB::table('users')->where('id', '=', $id)->get();
        return response()->json(array(
            'error' => false,
            'result' => $compteinfo,
            'status_code' => 200
        ));
    }


    public function EditCompte()
    {
        $mobilUser = request()->all();

        $update = User::find($mobilUser['id']);
        $update->name = $mobilUser['name'];
        $update->email = $mobilUser['email'];
        $update->password = bcrypt($mobilUser['password']);
        $update->prenom = $mobilUser['prenom'];
        $update->civilite = $mobilUser['civilite'];
        $update->numero_telephone = $mobilUser['numero_telephone'];
        $update->date_naissance = $mobilUser['date_naissance'];
        $update->lieu_naissance = $mobilUser['lieu_naissance'];
        $update->adresse_domicile = $mobilUser['adresse_domicile'];
        $update->postal_domicile = $mobilUser['postal_domicile'];
        $update->ville_domicile = $mobilUser['ville_domicile'];
        $update->save();


        $compteinfo = DB::table('users')->where('id', '=', $mobilUser['id'])->get();


        return response()->json(array(
            'error' => false,
            'result' => $compteinfo,
            'status_code' => 200
        ));

    }

}