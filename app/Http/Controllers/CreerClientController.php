<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 21/06/2017
 * Time: 10:44
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class CreerClientController extends Controller
{
    public function CreerUser(Request $request)
    {
        $post = $request->all();
        $v=\Validator::make($request->all(),
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'name'=>$post['name'],
                'email'=>$post['email'],
                'password'=>$post['password'],
            );
            DB::table('client')->insert($data);
        }
    }

}