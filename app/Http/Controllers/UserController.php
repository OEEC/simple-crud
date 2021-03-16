<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){

    }

    public function insert(Request $request){
        $usuario = new User();
        $usuario->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->clave, PASSWORD_BCRYPT),
        ])->save();
        return redirect("usuarios");
    }

    public function update(Request $request){
        $group = User::find($request['id']);
        $group->name = $request['name'];
        $group->email = $request['email'];
        $group->password = $request['email'];
        $group->save();
        return redirect()->back();
    }

    public function delete($id){
        $peliculaBorrar = Movie::find($id);
            //dd($peliculaBorrar);
            $peliculaBorrar->delete();
            return redirect('proximosEstrenos');
    }

}
