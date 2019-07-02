<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ExperienciaLaboral;
use App\EXPERIENCIA_POSTULANTE;
//use App\Departamento;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ExperienciaLaboralFormRequest;
use DB;

class ExperienciaLaboralController extends Controller
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
        return view('experienciaLaboral.index');

    }

    public function create()
    {
        //$postu = DB::select('SELECT * FROM postulante');
        //extraer todos los postulante creados por ese usuario 
        $data=\Auth::user()->id;
        $postu = DB::table('postulante')->where('iduser','=',$data)->get();
        
        return view("experienciaLaboral.create")->with('postu',$postu); 
    }
//ExperienciaLaboralFormRequest
    public function store(ExperienciaLaboralFormRequest $request)
    {
        $data=$request->idpostulante;
        //dd($data);

        $experiencia = new ExperienciaLaboral;
        $experiencia->nombrepuesto=$request->get('nombrepuesto');
        $experiencia->fechainicio=$request->get('fechainicio');
        $experiencia->fechafin=$request->get('fechafin');
        $experiencia->funcion=$request->get('funcion'); 
        $experiencia->nombreorganizacion=$request->get('nombreorganizacion');
        $experiencia->telefonoorganizacion=$request->get('telefonoorganizacion');
        $experiencia->correoorganizacion=$request->get('correoorganizacion');

        $experiencia->save();

        //$experiencia->postulantes()->attach($data);
        //dd($request->all());
        //$experiencia->postulantes()->attach($data);
        $postulante_experiencia = new EXPERIENCIA_POSTULANTE;
        $postulante_experiencia->idexperiencialaboral=$experiencia->idexperiencialaboral;
        $postulante_experiencia->idpostulante=$data;
        
        $postulante_experiencia->save();


        return Redirect::to('experienciaLaboral');
    }

    public function show(Request $request)
    {
        //extraer todos los postulante creados por ese usuario 
        $data=\Auth::user()->id;
        $postulante = DB::table('postulante')->select('idpostulante')->where('iduser','=',$data)->get();
        //dd($postulante);

        //si contiene un array con ningun elemento mandara un mensaje
        if(count($postulante)==0) {
            //dd("no tiene elementos");
            Session::flash('message', 'No hay registro de Experiencias laborales');
            return Redirect::to('experienciaLaboral');
        }

        foreach ($postulante as $postulante) {
            $data2[]=$postulante->idpostulante;
        }
        //dd($data2);
        $expe_postu = DB::table('experiencia_laboral_postulante')->whereIn('idpostulante',$data2)->get();
        //dd($expe_postu);
        foreach ($expe_postu as $expe_postu) {
            $data3[]=$expe_postu->idexperiencialaboral;
        }
        //dd($data3);
        $experiencia=DB::table('experiencia_laboral')->whereIn('idexperiencialaboral',$data3)->get();
        //dd($experiencia);

        return view('experienciaLaboral.registros')->with('experiencia',$experiencia);

    }

    public function edit($id)
    {
        return view("experienciaLaboral.edit",["expe"=>ExperienciaLaboral::findOrFail($id)]);
    }

    public function update(ExperienciaLaboralFormRequest $request,$id)
    {
        $experiencia=ExperienciaLaboral::findOrFail($id);
        $experiencia->nombrepuesto=$request->get('nombrepuesto');
        $experiencia->fechainicio=$request->get('fechainicio');
        $experiencia->fechafin=$request->get('fechafin');
        $experiencia->funcion=$request->get('funcion'); 
        $experiencia->nombreorganizacion=$request->get('nombreorganizacion');
        $experiencia->telefonoorganizacion=$request->get('telefonoorganizacion');
        $experiencia->correoorganizacion=$request->get('correoorganizacion');
        $experiencia->update();
        //dd($request->all());
        
        return Redirect::to('experienciaLaboral/show');
    }

    public function destroy($id)
    {
        $experiencia=ExperienciaLaboral::findOrFail($id);
        $data=$experiencia->idexperiencialaboral;
        $table1 = DB::table('experiencia_laboral_postulante')->select('id')->where('idexperiencialaboral','=',$data)->get();

        foreach ($table1 as $table1) {
            $dato2 = $table1->id;
        }

        $id2=EXPERIENCIA_POSTULANTE::findOrFail($dato2);

        $id2->delete();
        $experiencia->delete();
        
        return Redirect::to('experienciaLaboral/show');
    }
}
