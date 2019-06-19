<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulante; 
use App\TipoLogro;
use App\Logro;
use Laracasts\Flash\Flash;
use App\Http\Requests\LogroRequest;
use DB;

class LogroController extends Controller
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
            $tipologro = DB::select('SELECT * FROM tipo_logro');
            $query=trim($request->get('searchText'));
            $logro=DB::table('logro')->where('idpostulante','=',$idpostulante)
            ->orderBy('idlogro','ASC')
            ->paginate(7);
            return view('logro.index',["logro"=>$logro,"searchText"=>$query])
                    ->with('nombre',$nombre)
                    ->with('tipologro',$tipologro);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipologro = DB::select('SELECT * FROM tipo_logro');
        $postulante = DB::select('SELECT * FROM postulante');

        return view('logro.create')
                ->with('tipologro', $tipologro)
                ->with('postulante', $postulante);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogroRequest $request)
    {
        $data=\Auth::user()->id;
        $postulante = DB::table('postulante')->where('iduser','=',$data)->get();

        foreach( $postulante as $postulante )
        {
        $logro = new Logro($request->all());
        $logro->idpostulante=$postulante->idpostulante;
        $logro->save(); 
        }
         flash('
            <h4>Registro de Logro </h4>
            <p>El logro se ha registrado correctamente.</p>
        ')->success()->important();

         return redirect()->route('logro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('logro.menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipologro = DB::select('SELECT * FROM tipo_logro');
        $postulante = DB::select('SELECT * FROM postulante');
        $logro = Logro::find($id);

        return view('logro.edit')
                ->with('logro',$logro)
                ->with('tipologro',$tipologro)
                ->with('postulante', $postulante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogroRequest $request, $id)
    {
        $logro = Logro::find($id);
        $logro->fill($request->all());
        $logro->save();

        flash('
            <h4>Edición de logro</h4>
            <p>El logro se ha editado correctamente.</p>
        ')->success()->important();


        return redirect()->route('logro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logro = Logro::find($id);
        $logro->delete($id);

         flash('
            <h4>Eliminar logro</h4>
            <p>El logro se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('logro.index');
    }
}
