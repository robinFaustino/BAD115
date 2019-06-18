<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoLogro;
use Laracasts\Flash\Flash;
use DB;

class TipoLogroController extends Controller
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
            $tipologro=DB::table('tipo_logro')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idtipologro','ASC')
            ->paginate(7);
            return view('tipologro.index',["tipologro"=>$tipologro,"searchText"=>$query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipologro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipologro= new TipoLogro($request->all());
        $tipologro->save();

        flash('
            <h4>Registro de Tipo logro</h4>
            <p>Eltipo logro: <strong>' . $tipologro->nombre . ' '.'</strong> se ha registrado correctamente.</p>
        ')->success()->important();

        return redirect()->route('tipologro.index');
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
        $tipologro = TipoLogro::find($id);

        return view('tipologro.edit')
                ->with('tipologro', $tipologro);
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
        $tipologro = TipoLogro::find($id);
        $tipologro->fill($request->all());

        $tipologro->save();


        flash('
            <h4>Edición de Tipo de logro</h4>
            <p>El tipo logro <strong>' . $tipologro->nombre . ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();

        return redirect()->route('tipologro.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipologro = TipoLogro::find($id);
        $tipologro->delete($id);

        flash('
            <h4>Eliminar Tipo de Logro</h4>
            <p>Tipo de logro <strong>' . $tipologro->nombre . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('tipologro.index');
        
    }
}
