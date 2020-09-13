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
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('/seguridad/login');
});

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');

Route::get('/index', 'Admin\AdminController@index')
	->middleware('auth');

/*Rutas Usuarios*/
Route::group(['prefix' => 'users', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	
  	Route::get('/index', 'UsuarioController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_usuarios"))
  	->name('list_users');

	Route::get('/create', 'UsuarioController@crear')
	->middleware(sprintf("autorizacion:%s", "crear_usuarios"))
	->name('create_users');
	Route::post('/store', 'UsuarioController@guardar')
	->middleware(sprintf("autorizacion:%s", "crear_usuarios"))
	->name('store_users');

	Route::get('/{id}/edit', 'UsuarioController@editar')
	->middleware(sprintf("autorizacion:%s", "modificar_usuarios"))
	->name('edit_user');
	Route::put('/{id}/update', 'UsuarioController@actualizar')
	->middleware(sprintf("autorizacion:%s", "modificar_usuarios"))
	->name('user_update');

	Route::get('/{id}/destroy','UsuarioController@eliminar')
	->middleware(sprintf("autorizacion:%s", "eliminar_usuarios"))
	->name('destroy_user');

});
/*fin rutas usuarios*/

/*Rutas roles*/
Route::group(['prefix' => 'roles', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'RoleController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_roles"))
	->name('list_roles');

	Route::get('/create', 'RoleController@create')
	->middleware(sprintf("autorizacion:%s", "crear_roles"))
	->name('create_roles');

	Route::post('/store', 'RoleController@store')
	->middleware(sprintf("autorizacion:%s", "crear_roles"))
	->name('store_roles');

	Route::get('/{role}/edit', 'RoleController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_roles"))
	->name('edit_roles');

	Route::put('/{role}/update', 'RoleController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_roles"))
	->name('update_roles');

	Route::get('/{id}/destroy','RoleController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_roles"))
	->name('destroy_roles');

	Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin Rutas Roles*/

/* Rutas de Partidas*/

Route::group(['prefix' => 'partidas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'PartidaController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_partidas"))
	->name('list_partidas');

	Route::get('/create', 'PartidaController@create')
	->middleware(sprintf("autorizacion:%s", "crear_partidas"))
	->name('create_partidas');

	Route::post('/store', 'PartidaController@store')
	->middleware(sprintf("autorizacion:%s", "crear_partidas"))
	->name('store_partidas');

	Route::get('/{id}/edit', 'PartidaController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_partidas"))
	->name('edit_partidas');

	Route::put('/{partida}/update', 'PartidaController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_partidas"))
	->name('update_partidas');

	Route::get('/{partida}/destroy','PartidaController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_partidas"))
	->name('destroy_partidas');

	Route::delete('/{partida}/destroy', 'PartidaController@changeStatus')->name('destroy_partida');

	Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin rutas Partidas*/

/* Rutas Articulos*/
Route::group(['prefix' => 'articulos', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ArticuloController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_articulos"))
	->name('list_articulos');

	Route::get('/create', 'ArticuloController@create')
	->middleware(sprintf("autorizacion:%s", "crear_articulos"))
	->name('create_articulos');

	Route::post('/store', 'ArticuloController@store')
	->middleware(sprintf("autorizacion:%s", "crear_articulos"))
	->name('store_articulos');

	Route::get('/{articulo}/edit', 'ArticuloController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_articulos"))
	->name('edit_articulos');

	Route::put('/{articulo}/update', 'ArticuloController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_articulos"))
	->name('update_articulos');

	Route::get('/{articulo}/destroy','ArticuloController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_articulos"))
	->name('destroy_articulos');

	Route::delete('/{articulo}/destroy', 'ArticuloController@changeStatus')->name('destroy_articulos');

	Route::get('/', 'PermissionController@index')->name('permisos');
});
/* fin rutas Articulos*/

/*Rutas Medidas*/
Route::group(['prefix' => 'medidas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'MedidaController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_medidas"))
	->name('list_medidas');

	Route::get('/create', 'MedidaController@create')
	->middleware(sprintf("autorizacion:%s", "crear_medidas"))
	->name('create_medidas');

	Route::post('/store', 'MedidaController@store')
	->middleware(sprintf("autorizacion:%s", "crear_medidas"))
	->name('store_medidas');

	Route::get('/{id}/edit', 'MedidaController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_medidas"))
	->name('edit_medidas');

	Route::put('/{medida}/update', 'MedidaController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_medidas"))
	->name('update_medidas');

	Route::get('/{id}/destroy','MedidaController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_medidas"))
	->name('destroy_medidas');

	Route::delete('/{medida}/destroy', 'MedidaController@changeStatus')->name('destroy_medida');

	Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin Rutas Medidas*/

/*Rutas Gestionar Areas*/
Route::group(['prefix' => 'areas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'AreaController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_areas"))
	->name('list_areas');

	Route::get('/create', 'AreaController@create')
	->middleware(sprintf("autorizacion:%s", "crear_areas"))
	->name('create_areas');

	Route::post('/store', 'AreaController@store')
	->middleware(sprintf("autorizacion:%s", "crear_areas"))
	->name('store_areas');

	Route::get('/{id}/edit', 'AreaController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_areas"))
	->name('edit_areas');

	Route::put('/{medida}/update', 'AreaController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_areas"))
	->name('update_areas');

	Route::get('/{id}/destroy','AreaController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_areas"))
	->name('destroy_areas');

	Route::delete('/{medida}/destroy', 'AreaController@changeStatus')->name('destroy_areas');

	Route::get('/', 'PermissionController@index')->name('permisos');
});
/* Fin Gestionar Areas*/