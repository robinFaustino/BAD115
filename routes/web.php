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


Route::group(['middleware' => 'auth', 'admin'], function() {

Route::get('/admin', function () {
    return view('admin/menu');
});

Route::resource('ofertas','OfertaController');
Route::resource('admin/usuarios','UsuarioController');
Route::get('admin/usuario','UsuarioController@create');

//Rutas para tipo de logro
Route::resource('tipologro', 'TipoLogroController');

//Ruta para logro
Route::resource('logro','LogroController');


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
route::resource('postulante','PostulanteController');
Route::resource('puesto','Puesto_TrabajoController');
//Route::resource('postulante/curriculum','PostulanteController');
///Route::get('postulante/curriculum1','PostulanteController@create');


//Rutas con rol de Empresa 
Route::group(['middleware' => 'empresa'], function(){

Route::resource('empresas','EmpresaController');
Route::resource('empresas_ofertar','Puesto_TrabajoController');
//Route::post('empresa','EmpresaController@index2');
Route::post('empresa','EmpresaController@store');
Route::post('puesto','Puesto_TrabajoController@store');

}); 


//Rutas con rol de Usuario

Route::group(['middleware' => 'usuario'], function(){

//ruta para el crud de conocimiento academico
Route::resource('conocimientoAcademico','Conocimiento_AcademicoController');

//rutas para el crud de Publicaciones 
Route::resource('publicacion','PublicacionController');

//ruta para el crud de habilidad_lenguaje
Route::resource('habilidad_lenguaje', 'HabilidadLenguajeController');

//ruta para el crud de idioma
Route::resource('idioma','IdiomaController');

//Route::post('puesto','Puesto_TrabajoController@agregarTrabajo');

/**Route::get('/empresa', function () {
    return view('empresas/main');
});
Route::post('/empresa/edit', function () {

    return view('empresas/edit');
});
Route::resource('empresas/ofertar','EmpresaController');
Route::get('empresas','EmpresaController@create');**/


Route::resource('recomendacion','RecomendacionController');
});

});

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ruta para el crud de experiencia laboral
Route::resource('experienciaLaboral','ExperienciaLaboralController');

//ruta para el crud de certificacion
Route::resource('certificacion','CertificacionController');
// ruta para el crud de Pais
Route::resource('pais','PaisController');