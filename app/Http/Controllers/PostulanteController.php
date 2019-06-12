<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Postulante;
//use App\Rol;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PostulanteFormRequest;
use DB;

class PostulanteController extends Controller
{
    //
	public function __construct()
    {

    }
/**
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
**/
    public function create(Request $request)
    {
        //$roles=DB::table('roles');
        //$roles = "SELECT * FROM roles";
        //$roles = DB::select('SELECT * FROM roles');
        //dd($roles);
        //$roles = Rol::orderBy('id','ASC')->get();

        return view('postulante.curriculum.create');
    }	   
//Request $request);//
    /**
    public function store(UsuarioFormRequest $request)
    {
        
        //dd($request->all());
        /**$user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        dd('Usuario creado');**/ /**

        $usuario = new User;
        $usuario->nombre=$request->get('nombre');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->role_id=$request->get('role_id');

        $usuario->save();
        

        return Redirect::to('admin/usuarios');
        //return Redirect::to('clinica/medico');

    }**/
}
