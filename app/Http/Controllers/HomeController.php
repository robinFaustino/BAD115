<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function actualizarPassword(Request $request, $id)
    {
        // Validación.
        $this->validate(request(), [
            'password' => 'required|min:8|max:100|confirmed',
        ]);

        $user = User::find($id);

        $user->fill($request->all());

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        flash('
            <h4>Contraseña</h4>
            <p>La contraseña se ha editado correctamente.</p>
        ')->success()->important();

        return redirect()->route('home');
    }
}
