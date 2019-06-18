<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Postulante;
use App\Pais;
use App\Departamento;
use App\Municipio;
use App\Puesto_Trabajo;
use App\Postulante_Puesto;
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
        //dd($request->get('idpuestotrabajo'));
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

        $data=\Auth::user()->id;
        $postulante->iduser=$data;

        $postulante->save();

        $postulante_puesto = new Postulante_Puesto;
        $postulante_puesto->idpuestotrabajo = $request->get('idpuestotrabajo');
        $postulante_puesto->idpostulante = $postulante->idpostulante;
        $postulante_puesto->estado='0';
        $postulante_puesto->save();

        return view('postulante.index');
    }

    public function byidpais($id){
        return Departamento::where('idpais',$id)->get();
    }

    public function byiddepartamento($id){
        return Municipio::where('iddepartamento',$id)->get();
    }

    public function show(Request $request){

        $data=\Auth::user()->id;
        //dd($data);
        $postulante = DB::table('postulante')->select('idpostulante')->where('iduser','=',$data)->get();
        //dd($postulante);
        foreach ($postulante as $postulante) {
            $data2[]=$postulante->idpostulante;
        }
        //dd($data2);
        $puesto_postu=DB::table('postulante_puesto')->whereIn('idpostulante',$data2)->get();
        
        //dd($puesto_postu);
        /*foreach ($puesto_postu as $puesto_postu) {
            $data3[]=$puesto_postu->idpuestotrabajo;
        }
        //dd($data3);
        $puestoTrabajo=DB::table('puesto_trabajo')->whereIn('idpuestotrabajo',$data3)->get();
        //dd($puestoTrabajo);*/
        return view('postulante.show')->with('puesto_postu',$puesto_postu);//->with('puestoTrabajo',$puestoTrabajo);

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
