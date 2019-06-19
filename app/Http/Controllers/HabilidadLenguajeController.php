<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulante;
use App\HabilidadLenguaje;
use App\Http\Requests\HabilidadLenguajeRequest;
use DB;
use App\Idioma;

class HabilidadLenguajeController extends Controller
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

             $data=\Auth::user()->id;

            $postulante = DB::table('postulante')->where('iduser','=',$data)->get();

            foreach($postulante as $postulante){
                $idpostulante[]=$postulante->idpostulante;
                $nombre[]=$postulante->firtsname;
            }
            $query=trim($request->get('searchText'));
            $habilidadLenguaje=DB::table('habilidad_lenguaje')->where('idpostulante','=',$idpostulante)
            ->orderBy('idhabilidadlenguaje','ASC')
            ->paginate(7);
            return view('habilidadLenguaje.index',["habilidadLenguaje"=>$habilidadLenguaje,"searchText"=>$query])
                    ->with('nombre',$nombre);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idioma = DB::select('SELECT * FROM idioma');
        return view('habilidadLenguaje.create')
                ->with('idioma', $idioma);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabilidadLenguajeRequest $request)
    {
         $data=\Auth::user()->id;
        $postulante = DB::table('postulante')->where('iduser','=',$data)->get();

        foreach( $postulante as $postulante )
        {
        $habilidadLenguaje = new HabilidadLenguaje($request->all());
        $habilidadLenguaje->idpostulante = $postulante->idpostulante;
        $habilidadLenguaje->save(); 
        }

         flash('
            <h4>Registro de habilidad de lenguaje </h4>
            <p>La habilidad de lenguaje se ha registrado correctamente.</p>
        ')->success()->important();

         return redirect()->route('habilidad_lenguaje.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('habilidadLenguaje.menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idioma = DB::select('SELECT * FROM idioma');
        $habilidadLenguaje = HabilidadLenguaje::find($id);

        return view('habilidadLenguaje.edit')
                ->with('habilidadLenguaje',$habilidadLenguaje)
                ->with('idioma',$idioma);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HabilidadLenguajeRequest $request, $id)
    {
        $habilidadLenguaje = HabilidadLenguaje::find($id);
        $habilidadLenguaje->fill($request->all());
        $habilidadLenguaje->save();

        flash('
            <h4>Edición de habilidad de Lenguaje</h4>
            <p>La Habilidad de lenguaje  <strong>' . $habilidadLenguaje->tipo . ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();


        return redirect()->route('habilidad_lenguaje.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habilidadLenguaje = HabilidadLenguaje::find($id);
        $habilidadLenguaje->delete($id);

         flash('
            <h4>Eliminar habilidad de Lenguaje</h4>
            <p>La habilidad de Lenguaje <strong>' . $habilidadLenguaje->tipo . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('habilidad_lenguaje.index');
    }
}
