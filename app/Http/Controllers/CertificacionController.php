<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Certificacion;
use App\Postulante;
use App\Certificacion_Postulante;
use Illuminate\Support\Facades\Redirect;
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
        $postu = DB::select('SELECT * FROM postulante');

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

        $certificacion = DB::select('SELECT * FROM certificacion');

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
        $certificacion->delete();
        
        return Redirect::to('certificacion/show');
    }
}
