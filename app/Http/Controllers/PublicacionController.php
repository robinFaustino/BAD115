<?php

namespace App\Http\Controllers;

use App\Publicacion;
use Illuminate\Http\Request;
use App\Postulante; 
use Laracasts\Flash\Flash;
use DB;
use App\Http\Requests\PublicacionRequests;

class PublicacionController extends Controller
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
            $postulante = DB::select('SELECT * FROM postulante');
            $query=trim($request->get('searchText'));
            $publicacion=DB::table('publicacion')->where('titulo','LIKE','%'.$query.'%')
            ->orderBy('idpublicacion','ASC')
            ->paginate(7);
            return view('publicacion.index',["publicacion"=>$publicacion,"searchText"=>$query])->with('postulante',$postulante);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postulantes = DB::select('SELECT * FROM postulante');

        return view('publicacion.create')
                ->with('postulantes',$postulantes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionRequests $request)
    {
        $publicacion = new Publicacion($request->all());
        $publicacion->save(); 

         flash('
            <h4>Registro de Publicacion </h4>
            <p>La publicacion <strong>' . $publicacion->titulo . ' '.'</strong> se ha registrado correctamente.</p>
        ')->success()->important();

         return redirect()->route('publicacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postulantes = DB::select('SELECT * FROM postulante');
        $publicacion = Publicacion::find($id);

        return view('publicacion.edit')
                ->with('publicacion',$publicacion)
                ->with('postulantes',$postulantes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(PublicacionRequests $request, $id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->fill($request->all());
        $publicacion->save();

        flash('
            <h4>Edición de Publicacion</h4>
            <p>La Publicacion <strong>' . $publicacion->titulo. ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();


        return redirect()->route('publicacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->delete($id);

         flash('
            <h4>Eliminar Publicacion</h4>
            <p>La Publicacion <strong>' . $publicacion->titulo . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('publicacion.index');
    }
}