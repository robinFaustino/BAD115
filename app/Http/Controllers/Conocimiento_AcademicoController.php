<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Conocimiento_Academico;
use App\Postulante_Conocimiento;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Conocimiento_AcademicoFormRequest;
use DB;

class Conocimiento_AcademicoController extends Controller
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
        return view('conocimientoAcademico.index');

    }

    public function show(Request $request)
    {

        $data=\Auth::user()->id;
        $postulante = DB::table('postulante')->select('idpostulante')->where('iduser','=',$data)->get();
        //dd($postulante);
        
        //si contiene un array con ningun elemento mandara un mensaje
        if(count($postulante)==0) {
            //dd("no tiene elementos");
            Session::flash('message', 'No hay registro de Conocimientos Academicos');
            return Redirect::to('conocimientoAcademico');
        }

        foreach ($postulante as $postulante) {
            $data2[]=$postulante->idpostulante;
        }
        //dd($data2);
        $cono_postu = DB::table('postulante_conocimiento')->whereIn('idpostulante',$data2)->get();
        //dd($cono_postu);
        foreach ($cono_postu as $cono_postu) {
            $data3[]=$cono_postu->idconocimientoacademino;
        }
        //dd($data3);
        $conoci=DB::table('conocomiento_academico')->whereIn('idconocimientoacademino',$data3)->get();
        //dd($conoci);

        return view('conocimientoAcademico.Registro')->with('conoci',$conoci);

    }

    public function create()
    {
        //$postu = DB::select('SELECT * FROM postulante');
        //extraer todos los postulante creados por ese usuario 
        $data=\Auth::user()->id;
        $postu = DB::table('postulante')->where('iduser','=',$data)->get();

        return view("conocimientoAcademico.create")->with('postu',$postu); 
    }
//Conocimiento_AcademicoFormRequest
    public function store(Conocimiento_AcademicoFormRequest $request)
    {
        $data=$request->idpostulante;
        //dd($data);

        $conoci = new Conocimiento_Academico;
        $conoci->tipo=$request->get('tipo');
        $conoci->nombre=$request->get('nombre'); 
        $conoci->institucionacademico=$request->get('institucionacademico');
        $conoci->fechainicio=$request->get('fechainicio');
        $conoci->fechafin=$request->get('fechafin');
        $conoci->save();
        //dd($request->all());
        //$conoci->postulantes()->attach($data);
        $postulante_conocimiento = new Postulante_Conocimiento;
        $postulante_conocimiento->idpostulante=$data;
        $postulante_conocimiento->idconocimientoacademino = $conoci->idconocimientoacademino;
        $postulante_conocimiento->save();

        return Redirect::to('conocimientoAcademico');
    }

    public function edit($id)
    {
        return view("conocimientoAcademico.edit",["conoci"=>Conocimiento_Academico::findOrFail($id)]);
    }

    public function update(Conocimiento_AcademicoFormRequest $request,$id)
    {
        $conoci=Conocimiento_Academico::findOrFail($id);
        $conoci->tipo=$request->get('tipo');
        $conoci->nombre=$request->get('nombre'); 
        $conoci->institucionacademico=$request->get('institucionacademico');
        $conoci->fechainicio=$request->get('fechainicio');
        $conoci->fechafin=$request->get('fechafin');
        $conoci->update();
        //dd($request->all());
        
        return Redirect::to('conocimientoAcademico/show');
    }

    public function destroy($id)
    {
        $conoci=Conocimiento_Academico::findOrFail($id);
        $data=$conoci->idconocimientoacademino;
        $table1 = DB::table('postulante_conocimiento')->select('id')->where('idconocimientoacademino','=',$data)->get();
        
        foreach ($table1 as $table1) {
            $dato2 = $table1->id;
        }
        
        $id2=Postulante_Conocimiento::findOrFail($dato2);
        $id2->delete();
        $conoci->delete();
        
        return Redirect::to('conocimientoAcademico/show');
    }
}
