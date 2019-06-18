<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HabilidadLenguaje;
use App\Idioma;
use Laracasts\Flash\Flash;
use DB;


class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request)
        {
            $query=trim($request->get('searchText'));
            $idioma=DB::table('idioma')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('ididioma','ASC')
            ->paginate(7);
            return view('idioma.index',["idioma"=>$idioma,"searchText"=>$query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habilidadLenguaje = DB::select('SELECT * FROM habilidad_lenguaje');

        return view('idioma.create')
                ->with('habilidadLenguaje',$habilidadLenguaje);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idioma= new Idioma($request->all());
        $idioma->save();

        flash('
            <h4>Registro de idioma</h4>
            <p>El idioma: <strong>' . $idioma->nombre . ' '.'</strong> se ha registrado correctamente.</p>
        ')->success()->important();

        return redirect()->route('idioma.index');
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
        $idioma = Idioma::find($id);
        $habilidadLenguaje = DB::select('SELECT * FROM habilidad_lenguaje');

        return view('idioma.edit')
                ->with('idioma', $idioma)
                ->with('habilidadLenguaje', $habilidadLenguaje);
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
        $idioma = Idioma::find($id);
        $idioma->fill($request->all());

        $idioma->save();


        flash('
            <h4>Edición idioma</h4>
            <p>El idioma <strong>' . $idioma->nombre . ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();

        return redirect()->route('idioma.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idioma = Idioma::find($id);
        $idioma->delete($id);

        flash('
            <h4>Eliminar idioma</h4>
            <p>El idioma: <strong>' . $idioma->nombre . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('idioma.index');
    }
}
