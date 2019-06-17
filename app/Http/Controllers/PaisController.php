<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pais;
use Laracasts\Flash\Flash;
use DB;

class PaisController extends Controller
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
            $pais=DB::table('pais')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idpais','ASC')
            ->paginate(7);
            return view('pais.index',["pais"=>$pais,"searchText"=>$query]);
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

                   return view('pais.create');


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

        $pais =new Pais($request->all());
        $pais->save();
        return redirect()->route('pais.index');

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
         $pais = Pais::find($id);

        return view('pais.edit')
                ->with('pais',$pais);



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
          $pais = Pais::find($id);
        $pais->fill($request->all());
        $pais->save();

        flash('
            <h4>Edición de Pais</h4>
            <p>El Pais <strong>' . $pais->nombre. ' ' . '</strong> se ha editado correctamente.</p>
        ')->success()->important();


        return redirect()->route('pais.index');


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

        $pais = Pais::find($id);
        $pais->delete($id);

         flash('
            <h4>Eliminar Publicacion</h4>
            <p>El pais <strong>' . $pais->nombre . ' ' . '</strong> se ha eliminado correctamente.</p>
        ')->error()->important();

         return redirect()->route('pais.index');
    }
}
