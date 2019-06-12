<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\Departamento;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpresaFormRequest;
use DB;

class EmpresaController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(Request $request)
    {
       /** if ($request)
        {
            $roles = DB::select('SELECT * FROM roles');
            $query=trim($request->get('searchText'));
            $user=DB::table('users')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','ASC')
            ->paginate(7);
            return view('admin.usuarios.index',["user"=>$user,"searchText"=>$query])->with('roles',$roles);
        }**/
        return view('empresas.index');

    }

    public function index2(Request $request)
    {
        //dd($request->all());
        /**$depa = DB::select('SELECT * FROM departamento');
        $empresa = new Empresa;
        $empresa->nombre=$request->get('nombre');
        $empresa->paginaweb=$request->get('paginaweb');
        $empresa->descripcion=$request->get('descripcion');
        $empresa->correo=$request->get('correo');
        $empresa->telefono=$request->get('telefono');

        $empresa->save();**/
        return view('empresas.index2')->with('depa',$depa);
    }

    public function create(Request $request)
    {
        //$roles=DB::table('roles');
        //$roles = "SELECT * FROM roles";
        /**$roles = DB::select('SELECT * FROM roles');
        //dd($roles);
        //$roles = Rol::orderBy('id','ASC')->get();

        return view('admin.usuarios.create')->with('roles',$roles);**/
        return view('empresas.create');
    }
    public static function create2(Request $request)
    {
        
        return view('empresas.create2');
    }
//Request $request);//PacienteFormRequest $request
    public function store(EmpresaFormRequest $request)
    {
        $depa = DB::select('SELECT * FROM departamento');
        $empresa = new Empresa;
        $empresa->nombre=$request->get('nombre');
        $empresa->paginaweb=$request->get('paginaweb');
        $empresa->descripcion=$request->get('descripcion');
        $empresa->correo=$request->get('correo');
        $empresa->telefono=$request->get('telefono');

        $empresa->save();

        return view('empresas.create2')->with('depa',$depa)->with('empresa',$empresa);
        //return Redirect::to('empresas');

    } 
}
