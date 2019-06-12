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


Route::group(['middleware' => 'auth'], function() {


Route::group(['middleware' => 'Administrador'], function() {

Route::get('/admin', function () {
    return view('admin/menu');
});

Route::resource('admin/usuarios','UsuarioController');
Route::get('admin/usuario','UsuarioController@create');


Route::get('/ofertas', function () {
    return view('postulante/menu');
});

Route::resource('postulante/curriculum','PostulanteController');
Route::get('postulante/curriculum1','PostulanteController@create');

Route::resource('empresas','EmpresaController');
Route::resource('empresas_ofertar','Puesto_TrabajoController');
//Route::post('empresa','EmpresaController@index2');
Route::post('empresa','EmpresaController@store');
Route::post('puesto','Puesto_TrabajoController@store');

//ruta para el crud de conocimiento academico
Route::resource('conocimientoAcademico','Conocimiento_AcademicoController');

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