<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\Departamento;
use App\Postulante_Puesto;
use App\Postulante;
use App\Puesto_Trabajo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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

    public function candidatos(Request $request)
    {
        $depa = DB::select('SELECT * FROM departamento');
        //dd($depa);
        $data=\Auth::user()->id;
        //dd($data);
        $puesto = DB::table('puesto_trabajo')->select('idpuestotrabajo')->where('iduser','=',$data)->get();
        //dd($puesto);

        //si contiene un array con ningun elemento mandara un mensaje
        if(count($puesto)==0) {
            //dd("no tiene elementos");
            Session::flash('message', 'No hay candidatos ofertando por puesto');
            return Redirect::to('empresas');
        }

        foreach ($puesto as $puesto) {
            $data2[]=$puesto->idpuestotrabajo;
        }
        //dd($data2);
        $puesto_postu=DB::table('postulante_puesto')->whereIn('idpuestotrabajo',$data2)->where('estado','=','1')->get();
        //dd($puesto_postu);

        return view('empresas.vistaCandidatos')->with('puesto_postu',$puesto_postu);
    }

    //metodo para ver los perfiles de los candidatos
    public function ver(Request $request,$id)
    {
        //dd($id);
        //dd($data);
        $data=DB::table("postulante_puesto")
        ->join('postulante','postulante_puesto.idpostulante','=','postulante.idpostulante')
        ->select('postulante.idpostulante as id','postulante.firtsname as n1','postulante.lastname as a1','postulante.genero','postulante.fechanacimiento as fecha','postulante.dui','postulante.telefono','postulante.correo')
        ->where('postulante_puesto.idpostulante','=',$id)
        ->get();
        //dd($data);
    
        //dd($id);
        $conocimiento=DB::table("postulante_conocimiento")
        ->join('conocomiento_academico','postulante_conocimiento.idconocimientoacademino','=','conocomiento_academico.idconocimientoacademino')
        ->where('idpostulante','=',$id)
        ->get();
        //dd($conocimiento);
        /*foreach ($data as $data) {
            dd($data->id);
        }*/

        $expe=DB::table("experiencia_laboral_postulante")
        ->join('experiencia_laboral','experiencia_laboral_postulante.idexperiencialaboral','=','experiencia_laboral.idexperiencialaboral')
        ->where('idpostulante','=',$id)
        ->get();
        //dd($expe);

        return view('empresas.perfil')->with('data',$data)->with('conocimiento',$conocimiento)->with('expe',$expe);
    } 
}
