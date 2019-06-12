<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Rol;
use Illuminate\Support\Facades\Redirect;
use DB;
use Laracasts\Flash\Flash;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $roles = DB::select('SELECT * FROM roles');
            $query=trim($request->get('searchText'));
            $user=DB::table('users')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','ASC')
            ->paginate(7);
            return view('admin.usuarios.index',["user"=>$user,"searchText"=>$query])->with('roles',$roles);
        }

    }

    public function create(Request $request)
    {
        //$roles=DB::table('roles');
        //$roles = "SELECT * FROM roles";
        $roles = DB::select('SELECT * FROM roles');
        //dd($roles);
        //$roles = Rol::orderBy('id','ASC')->get();

        return view('admin.usuarios.create')->with('roles',$roles);
    }
//Request $request);//
    public function store(Request $request)
    {
        
        //dd($request->all());
        /**$user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        dd('Usuario creado');**/

        $usuario = new User;
        $usuario->nombre=$request->get('nombre');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->role_id=$request->get('role_id');

        $usuario->save();

        flash('
            <h4>Registro de Usuario</h4>
            <p>El usuario <strong>' . $usuario->nombre . ' ' . '</strong> se ha registrado correctamente.</p>
        ')->success()->important();
        

        return Redirect::to('admin/usuarios');
        //return Redirect::to('clinica/medico');

    }
        flash('
            <h4>Registro de Usuario</h4>
            <p>El usuario <strong>' . $usuario->nombre . ' ' . '</strong> se ha registrado correctamente.</p>
        ')->success()->important();
        

        return Redirect::to('admin/usuarios');

    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        flash('
            <h4>Edición de Usuario</h4>
            <p>El usuario <strong>' . $user->nombre . ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();


        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = DB::select('SELECT * FROM roles');

        return view('admin.usuarios.edit')
            ->with('user',$user)
            ->with('roles', $roles);
    }


    public function destroy($id){
        $user = User::find($id);
        $user->delete($id);

        flash('
            <h4>Eliminar Usuario</h4>
            <p>El usuario <strong>' . $user->nombre . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

        return redirect()->route('usuarios.index');
    }
}
