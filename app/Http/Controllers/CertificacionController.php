<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Certificacion;
use App\Postulante;
use App\Certificacion_Postulante;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CertificadoFormRequest;
use DB;

class CertificacionController extends Controller
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
        return view('certificacion.index');

    }

    public function create()
    {
        //$postu = DB::select('SELECT * FROM postulante');
        //extraer todos los postulante creados por ese usuario 
        $data=\Auth::user()->id;
        $postu = DB::table('postulante')->where('iduser','=',$data)->get();

        return view("certificacion.create")->with('postu',$postu); 
    }
//
    public function store(CertificadoFormRequest $request)
    {
        $data=$request->idpostulante;

        $certificacion = new Certificacion;
        $certificacion->titulo=$request->get('titulo');
        $certificacion->tipo=$request->get('tipo');
        $certificacion->codigo=$request->get('codigo');
        $certificacion->institucion=$request->get('institucion'); 
        $certificacion->fechainicio=$request->get('fechainicio');
        $certificacion->fechafin=$request->get('fechafin');
        $certificacion->save();
        //dd($request->all());
        $certificacion_postulante = new Certificacion_Postulante;
        $certificacion_postulante->idcertificacion = $certificacion->idcertificacion;
        $certificacion_postulante->idpostulante=$data;
        $certificacion_postulante->save();

        return Redirect::to('certificacion');
    }

    public function show(Request $request)
    {

        //$certificacion = DB::select('SELECT * FROM certificacion');
        $data=\Auth::user()->id;
        $postulante = DB::table('postulante')->select('idpostulante')->where('iduser','=',$data)->get();

        //si contiene un array con ningun elemento mandara un mensaje
        if(count($postulante)==0) {
            //dd("no tiene elementos");
            Session::flash('message', 'No hay registro de certificacion');
            return Redirect::to('certificacion');
        }
        
        foreach ($postulante as $postulante) {
            $data2[]=$postulante->idpostulante;
        }

        
        $certi_postu = DB::table('certificacion_postulante')->whereIn('idpostulante',$data2)->get();
        
        foreach ($certi_postu as $certi_postu) {
            $data3[]=$certi_postu->idcertificacion;
        }

        $certificacion=DB::table('certificacion')->whereIn('idcertificacion',$data3)->get();

        return view('certificacion.registros')->with('certificacion',$certificacion);

    }

    public function edit($id)
    {
        return view("certificacion.edit",["certi"=>Certificacion::findOrFail($id)]);
    }

    public function update(CertificadoFormRequest $request,$id)
    {
        $certificacion=Certificacion::findOrFail($id);
        $certificacion->titulo=$request->get('titulo');
        $certificacion->tipo=$request->get('tipo');
        $certificacion->codigo=$request->get('codigo');
        $certificacion->institucion=$request->get('institucion'); 
        $certificacion->fechainicio=$request->get('fechainicio');
        $certificacion->fechafin=$request->get('fechafin');
        $certificacion->update();
        //dd($request->all());
        
        return Redirect::to('certificacion/show');
    }

    public function destroy($id)
    {
        $certificacion=Certificacion::findOrFail($id);
        $data=$certificacion->idcertificacion;
        $table1 = DB::table('certificacion_postulante')->select('id')->where('idcertificacion','=',$data)->get();
        foreach ($table1 as $table1) {
            $dato2 = $table1->id;
        }
        //dd($dato2);
        $id2=Certificacion_Postulante::findOrFail($dato2);
        //dd($id2);
        $id2->delete();
        $certificacion->delete();
        
        return Redirect::to('certificacion/show');
    }
}
