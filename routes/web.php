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

