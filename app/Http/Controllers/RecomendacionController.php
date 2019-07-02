<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recomendacion;
use App\Postulante; 
use App\Http\Requests\RecomendacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use DB;

class RecomendacionController extends Controller
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

            //si contiene un array con ningun elemento mandara un mensaje
            if(count($postulante)==0) {
                //dd("no tiene elementos");
                Session::flash('message', 'No hay registro de Recomendaciones');
                return Redirect::to('recomendacion\show');
            }

            foreach($postulante as $postulante){
                $idpostulante[]=$postulante->idpostulante;
                $nombre[]=$postulante->firtsname;
            }

            $query=trim($request->get('searchText'));
            $recomendacion=DB::table('recomendacion')->where('idpostulante','=', $idpostulante)
            ->orderBy('idrecomendacion','ASC')
            ->paginate(7);
            return view('recomendacion.index',["recomendacion"=>$recomendacion,"searchText"=>$query])->with('nombre',$nombre);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $postulantes=DB::select('SELECT * FROM postulante');

        return view('recomendacion.create')->with('postulantes',$postulantes); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecomendacionRequest $request)
    {
        $data=\Auth::user()->id;
        $postulante = DB::table('postulante')->where('iduser','=',$data)->get();

        foreach( $postulante as $postulante )
        {
        $recomendacion = new Recomendacion($request->all()); 
        $recomendacion->idpostulante=$postulante->idpostulante;
        $recomendacion->save();

        }

         flash('
            <h4>Registro de Recomendacion</h4>
            <p>La recomendacion de: <strong>' . $recomendacion->nombre . ' '.'</strong> se ha registrado correctamente.</p>
        ')->success()->important();

        return redirect()->route('recomendacion.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('recomendacion.menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postulantes = DB::select('SELECT * FROM postulante');
        $recomendacion = Recomendacion::find($id);

        return view('recomendacion.edit')
                ->with('recomendacion',$recomendacion)
                ->with('postulantes',$postulantes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecomendacionRequest $request, $id)
    {
        $recomendacion = Recomendacion::find($id);
        $recomendacion->fill($request->all());
        $recomendacion->save();

        flash('
            <h4>Edición de Recomendacion</h4>
            <p>La Recomendacion <strong>' . $recomendacion->nombre . ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();


        return redirect()->route('recomendacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recomendacion = Recomendacion::find($id);
        $recomendacion->delete($id);

         flash('
            <h4>Eliminar Recomendacion</h4>
            <p>La Recomendacion <strong>' . $recomendacion->nombre . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('recomendacion.index');
    }
}
