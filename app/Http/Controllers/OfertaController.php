<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Puesto_Trabajo;
use Illuminate\Support\Facades\Redirect;
use DB;

class OfertaController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	$puestos = DB::select('SELECT * FROM puesto_trabajo');
    	//dd($puestos);
      	return view('ofertas.index')->with('puestos',$puestos);
    }
}
