<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function() {

Route::get('/admin', function () {
    return view('admin/menu');
});

 // Editar contraseña.
    Route::put('/{user}/password', 'HomeController@actualizarPassword')->name('actualizar-password');

/*
*********************************************************
Grupo de rutas de acceso solo a usuarios administradores 
*********************************************************
*/
Route::group(['middleware' => ['admin']], function(){

    //Rutas para el CRUD de Usuarios
    Route::resource('admin/usuarios','UsuarioController');
    Route::get('admin/usuario','UsuarioController@create');

    //ruta para el crud de idioma
    Route::resource('idioma','IdiomaController');
}); 



Route::resource('ofertas','OfertaController');

/*Route::get('/ofertas', function () {
    return view('postulante/menu');
});*/

Route::get('puestoOfertas/{idpuestotrabajo}', function($idpuestotrabajo){

	$id=$idpuestotrabajo;
	$pais= DB::table('pais')->get();
	$departamento= DB::table('departamento')->get();
    $municipio= DB::table('municipio')->get();
	//dd($id);
	//dd($pais);

	return view('postulante.create')->with('paise',$pais)->with('id',$id)->with('dep',$departamento)->with('mun',$municipio);
});




Route::get('postulante/enviarOferta/{id}', function($id){
  
    $enviar=App\Postulante_Puesto::findOrFail($id);
    $enviar->estado='1';
    $enviar->update();
    //dd($enviar->estado);
    
    return Redirect::to('postulante/show');
});


Route::resource('puesto','Puesto_TrabajoController');

Route::get('candidatos', 'EmpresaController@candidatos')->name('empresas.candidatos');

//Route::post('puesto','Puesto_TrabajoController@agregarTrabajo');

/**Route::get('/empresa', function () {
    return view('empresas/main');
});
Route::post('/empresa/edit', function () {

    return view('empresas/edit');
});
Route::resource('empresas/ofertar','EmpresaController');
Route::get('empresas','EmpresaController@create');**/

/*
*********************************************************
Grupo de rutas de acceso solo a usuarios de tipo empresa 
*********************************************************
*/
Route::group(['middleware' => ['empresa']], function(){

Route::resource('empresas','EmpresaController');
Route::resource('empresas_ofertar','Puesto_TrabajoController');
//Route::post('empresa','EmpresaController@index2');
Route::post('empresa','EmpresaController@store');
Route::post('puesto','Puesto_TrabajoController@store');

}); 


/*
*********************************************************
Grupo de rutas de acceso solo a usuarios de tipo postulante 
*********************************************************
*/
Route::group(['middleware' => ['usuario']], function(){

route::resource('postulante','PostulanteController');
Route::resource('conocimientoAcademico','Conocimiento_AcademicoController');
Route::resource('recomendacion','RecomendacionController');
Route::resource('experienciaLaboral','ExperienciaLaboralController');
Route::resource('certificacion','CertificacionController');

//ruta para el crud de experiencia laboral
Route::resource('experienciaLaboral','ExperienciaLaboralController');

//ruta para el crud de certificacion
Route::resource('certificacion','CertificacionController');

//Rutas para tipo de logro
Route::resource('tipologro', 'TipoLogroController');

//Ruta para logro
Route::resource('logro','LogroController');

//ruta para el crud de conocimiento academico
Route::resource('conocimientoAcademico','Conocimiento_AcademicoController');

//rutas para el crud de Publicaciones 
Route::resource('publicacion','PublicacionController');

//ruta para el crud de habilidad_lenguaje
Route::resource('habilidad_lenguaje', 'HabilidadLenguajeController');

Route::resource('recomendacion','RecomendacionController');

//Route::post('puesto','Puesto_TrabajoController@agregarTrabajo');

/**Route::get('/empresa', function () {
    return view('empresas/main');
});
Route::post('/empresa/edit', function () {

    return view('empresas/edit');
});
Route::resource('empresas/ofertar','EmpresaController');
Route::get('empresas','EmpresaController@create');**/

});

});

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ruta para el crud de Pais
Route::resource('pais','PaisController');