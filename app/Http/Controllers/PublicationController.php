<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        $publication = DB::table('publication')->orderBy('id')->paginate(10);
        return View::make('listemagazine')->with('publication', $publication);

        /*
        $publication = DB::table('publication')->get();
        return View::make('listemagazine')->with('publication', $publication);
        */
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
                return redirect('listemagazine');
            }
        }
    }

    public function DisplayEditPublication($id)
    {

        $publication = DB::table('publication')->where('id','=', $id)->get();
        return View::make('modifpublication')->with('publication', $publication);

    }

    public function EditPublication(Request $request)
    {

        $post = $request->all();
        DB::table('publication')
            ->where('id', $post['id'])
            ->update(['titre' => $post['titre'],
                'nombre_numero' => $post['nombre_numero'] ,
                'photo_couverture' => $post['photo_couverture'] ,
                'description' => $post['description'] ,
                'prix_annuel' => $post['prix_annuel']]);


        $publication = DB::table('publication')->orderBy('id')->paginate(10);
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
            $i=DB::table('publication')->update($data);
            if($i>0)
            {
                \Session::flash('message','Client modifié !');

                $publication = DB::table('publication')->get();
                return View::make('listemagazine')->with('publication', $publication);
            }
        }
*/
    }


}
