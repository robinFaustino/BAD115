<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Examen;
use App\TipoExamen;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Examen::orderBy('fecha', 'desc')->paginate(20);
        $i = 1;
        return view('examenes.index')
            ->with('examenes', $examenes)
            ->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::orderBy('nombre', 'asc')->pluck('nombre', 'idempresa');
        $tipos_examen = TipoExamen::orderBy('nombre', 'asc')->pluck('nombre', 'idtipoexamen');
        return view('examenes.create')
            ->with('empresas', $empresas)
            ->with('tipos_examen', $tipos_examen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examen = new Examen($request->all());
        $examen->save();
        flash('
            <h4>Registro de Examen</h4>
            <p>El examen de tipo <strong>' . $examen->tipo_examen->nombre . '</strong> se ha registrado correctamente.</p>
        ')->success()->important();

        return redirect()->route('examenes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function agregar_preguntas($id)
    {
        $examen = Examen::find($id);
        $preguntas_fv = $examen->preguntas_fv();
        $preguntas_opc_mult = $examen->preguntas_opc_mult();
        return view('examenes.agregar_preguntas')
            ->with('examen', $examen)
            ->with('preguntas_fv', $preguntas_fv)
            ->with('preguntas_opc_mult', $preguntas_opc_mult);
    }
}
