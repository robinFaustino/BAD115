<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\Departamento;
use App\Puesto_Trabajo;
use App\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Puesto_TrabajoFormRequest;
use DB;

class Puesto_TrabajoController extends Controller
{
    public function index(Request $request)
    {
       
        //dd(\Auth::user()->id);
        $data=\Auth::user()->id;

        $puestos = DB::table('puesto_trabajo')->where('iduser','=',$data)->get();
        //dd($puestos);


        return view('empresas.puestos')->with('puestos',$puestos);
    }
    //Request


    public function store(Request $request)
    {
        
        $puesto = new Puesto_Trabajo;
        $data=$request->all();

        $puesto->idempresa=$request->get('idempresa');
        $empresa=Empresa::findOrFail($puesto->idempresa);
        $depa = DB::select('SELECT * FROM departamento');
        //dd($data);
        //return view('empresas.edit');
        //return Redirect::to('empresas');

        //http://www.cristalab.com/tutoriales/modulo-de-usuarios-ivvalidar-formulario-y-guardar-datos-con-laravel-c111651l/
        if ($puesto->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            //2$puesto->fill($data);
            //dd($depa);
            // Guardamos el usuario
            //$puesto->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            //return Redirect::route('admin.users.show', array($user->id));

            $puesto->iddepartamento=$request->get('iddepartamento');
            $puesto->nombre=$request->get('nombre');
            $puesto->descripcion=$request->get('descripcion');
            $puesto->experiencia=$request->get('experiencia');
            $puesto->anosexp=$request->get('anosexp');
            $puesto->salariomin=$request->get('salariomin');
            $puesto->salariomax=$request->get('salariomax');
            $puesto->conocimiento=$request->get('conocimiento');
            $puesto->educacion=$request->get('educacion');
            $puesto->rangoedad=$request->get('rangoedad');
            $puesto->vacantes=$request->get('vacantes');
            $puesto->fechacontrato=$request->get('fechacontrato');
            $puesto->estado= '0';
            $data=\Auth::user()->id;
            $puesto->iduser=$data; 

            $puesto->save();

            return Redirect::to('empresas');
        }
        else
        {   
            //dd($puesto);
            //1return Redirect::to('empresas');
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return view('empresas.create2')->with('depa',$depa)->with('empresa',$empresa);
        }


    }

    public function edit($id)
    {
        $puesto=Puesto_Trabajo::findOrFail($id);
        $dep=Departamento::findOrFail($puesto->iddepartamento);
        $depa=DB::select('SELECT * FROM departamento');
        $emp=Empresa::findOrFail($puesto->idempresa);

        return view("puesto.edit",["puesto"=>$puesto])->with('dep',$dep)->with('emp',$emp)->with('depa',$depa);
    }

    public function show($id)
    {
        $puesto=Puesto_Trabajo::findOrFail($id);
        $puesto->estado= '1';
        $puesto->update();
        
        return Redirect::to('empresas');
    }

    public function update(Puesto_TrabajoFormRequest $request,$id)
    {
        $puesto=Puesto_Trabajo::findOrFail($id);


        $puesto->idempresa=$request->get('idempresa');
        $puesto->iddepartamento=$request->get('iddepartamento');
        $puesto->nombre=$request->get('nombre');
        $puesto->descripcion=$request->get('descripcion');
        $puesto->experiencia=$request->get('experiencia');
        $puesto->anosexp=$request->get('anosexp');
        $puesto->salariomin=$request->get('salariomin');
        $puesto->salariomax=$request->get('salariomax');
        $puesto->conocimiento=$request->get('conocimiento');
        $puesto->educacion=$request->get('educacion');
        $puesto->rangoedad=$request->get('rangoedad');
        $puesto->vacantes=$request->get('vacantes');
        $puesto->fechacontrato=$request->get('fechacontrato');
        $data=\Auth::user()->id;
        $puesto->iduser=$data;

        $puesto->update();

        return Redirect::to('empresas');
    }

    public function destroy($id)
    {
        $puesto=Puesto_Trabajo::findOrFail($id);
        $puesto->delete();

        return Redirect::to('empresas_ofertar');
    }

    public function agregarTrabajo(Request $request,$id)
    {
        
        dd($request->all());
        return view('empresas.edit');
        //return Redirect::to('empresas');

    }
}
