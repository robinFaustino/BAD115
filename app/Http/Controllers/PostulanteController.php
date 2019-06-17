<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Postulante;
use App\Pais;
use App\Departamento;
use App\Municipio;
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
    public function index(Request $request)
    {
        
            
            return view('postulante.index');
        

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
        $pais= DB::table('pais')->get();
        $departamento= DB::table('departamento')->get();
        $municipio= DB::table('municipio')->get();
        //$roles=DB::table('roles');
        //$roles = "SELECT * FROM roles";
        //$roles = DB::select('SELECT * FROM roles');
        //dd($roles);
        //$roles = Rol::orderBy('id','ASC')->get();

        return view('postulante.create',["paise"=>$pais]);
    }

    public function store(PostulanteFormRequest $request)
    {
        $postulante = new Postulante;
        $postulante->firtsname=$request->get('firtsname');
        $postulante->secondsname=$request->get('secondsname');
        $postulante->lastname=$request->get('lastname');
        $postulante->genero=$request->get('genero');
        $postulante->fechanacimiento=$request->get('fechanacimiento');
        $postulante->dui=$request->get('dui');
        $postulante->pasaporte=$request->get('pasaporte');
        $postulante->nit=$request->get('nit');
        $postulante->nup=$request->get('nup');
        $postulante->idpais=$request->get('idpais');
        $postulante->departamento=$request->get('departamento');
        $postulante->municipio=$request->get('municipio');
        $postulante->correo=$request->get('correo');
        $postulante->telefono=$request->get('telefono');

        $postulante->save();

        return view('postulante.index');
    }

    public function byidpais($id){
        return Departamento::where('idpais',$id)->get();
    }

    public function byiddepartamento($id){
        return Municipio::where('iddepartamento',$id)->get();
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
