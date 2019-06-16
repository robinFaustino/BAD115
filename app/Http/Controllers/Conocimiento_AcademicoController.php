<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Conocimiento_Academico;
//use App\Departamento;
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

        $conoci = DB::select('SELECT * FROM conocomiento_academico');

        return view('conocimientoAcademico.Registro')->with('conoci',$conoci);

    }

    public function create()
    {
        return view("conocimientoAcademico.create"); 
    }

    public function store(Conocimiento_AcademicoFormRequest $request)
    {
        $conoci = new Conocimiento_Academico;
        $conoci->tipo=$request->get('tipo');
        $conoci->nombre=$request->get('nombre'); 
        $conoci->institucionacademico=$request->get('institucionacademico');
        $conoci->fechainicio=$request->get('fechainicio');
        $conoci->fechafin=$request->get('fechafin');
        $conoci->save();
        //dd($request->all());

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
        $conoci->delete();
        
        return Redirect::to('conocimientoAcademico/show');
    }
}