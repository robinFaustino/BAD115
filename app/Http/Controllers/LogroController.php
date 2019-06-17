<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulante; 
use App\TipoLogro;
use Laracasts\Flash\Flash;
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
            $postulante = DB::select('SELECT * FROM postulante');
            $tipologro = DB::select('SELECT * FROM tipo_logro');
            $query=trim($request->get('searchText'));
            $logro=DB::table('logro')->where('institucion','LIKE','%'.$query.'%')
            ->orderBy('idlogro','ASC')
            ->paginate(7);
            return view('logro.index',["logro"=>$logro,"searchText"=>$query])
                    ->with('postulante',$postulante)
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
    public function store(Request $request)
    {
        //
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
}
