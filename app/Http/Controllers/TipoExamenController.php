<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoExamen;
use Laracasts\Flash\Flash;
use DB; 

class TipoExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tipoexamen=DB::table('tipo_examen')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idtipoexamen','ASC')
            ->paginate(7);
            return view('tipoexamen.index',["tipoexamen"=>$tipoexamen,"searchText"=>$query]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            
          return view('tipoexamen.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tipoexamen =new TipoExamen($request->all());
        $tipoexamen->save();
        return redirect()->route('tipoexamen.index');

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
        $tipoexamen = TipoExamen::find($id);

        return view('tipoexamen.edit')
                ->with('tipoexamen',$tipoexamen);


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
          $tipoexamen = TipoExamen::find($id);
        $tipoexamen->fill($request->all());
        $tipoexamen->save();

        flash('
            <h4>Edición de Tipo de Examen</h4>
            <p>El Tipo de Examen <strong>' . $tipoexamen->nombre. ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();


        return redirect()->route('tipoexamen.index');

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
        $tipoexamen = TipoExamen::find($id);
        $tipoexamen->delete($id);

         flash('
            <h4>Eliminar Tipo de Examen</h4>
            <p>El Tipo de Examen <strong>' . $tipoexamen->nombre . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('tipoexamen.index');
    }
}
