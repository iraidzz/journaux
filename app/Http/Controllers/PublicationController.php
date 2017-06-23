<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;


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

    public function afficher()
    {
        $publication = DB::table('publications')->orderBy('id')->paginate(10);
        return View::make('listemagazine')->with('publication', $publication);

        /*
        $publication = DB::table('publications')->get();
        return View::make('listemagazine')->with('publication', $publication);
        */
    }

    public function FiltreMagazine(Request $request)
    {
        $post = $request->all();
        $laValeurRecherchee = $post['titre'];

        if ($laValeurRecherchee == '') {
            $publication = DB::table('publications')->orderBy('id')->paginate(10);
            return View::make('listemagazine')->with('publication', $publication);
        } else {
            $publication = DB::table('publications')->where('titre', '=', $laValeurRecherchee)->paginate(10);
            return View::make('listemagazine')->with('publication', $publication);
        }


        /*
        $publication = DB::table('publications')->get();
        return View::make('listemagazine')->with('publication', $publication);
        */
    }


    public function ajouterPublication(Request $request)
    {
        
        $dataUri = '';
        if (Input::file('photo') != null) {
            $image = Input::file('photo');
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $data = file_get_contents($image);
            $dataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);

        }

        $post = $request->all();
        $v = \Validator::make($request->all(),
            [
                'titre' => 'required',
                'nombre_numero' => 'required',
                'photo' => 'required',
                'description' => 'required',
                'prix_annuel' => 'required',
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

    public function DisplayEditPublication($id)
    {

        $publication = DB::table('publications')->where('id', '=', $id)->get();
        return View::make('modifpublication')->with('publication', $publication);

    }

    public function EditPublication(Request $request)
    {

        $post = $request->all();
        DB::table('publications')
            ->where('id', $post['id'])
            ->update(['titre' => $post['titre'],
                'nombre_numero' => $post['nombre_numero'],
                'photo_couverture' => $post['photo_couverture'],
                'description' => $post['description'],
                'prix_annuel' => $post['prix_annuel']]);


        $publication = DB::table('publications')->orderBy('id')->paginate(10);
        return View::make('listemagazine')->with('publication', $publication);
        /*
         *
         * Ou méthode dégueulasse (mais qui marche) avec required. (Mais modif toutes les publi)


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
                    $i=DB::table('publications')->update($data);
                    if($i>0)
                    {
                        \Session::flash('message','Client modifié !');

                        $publication = DB::table('publications')->get();
                        return View::make('listemagazine')->with('publication', $publication);
                    }
                }
        */
    }


}
