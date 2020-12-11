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


	Route::get('/{user}', 'UsuarioController@show')->middleware(sprintf("autorizacion:%s", "Mostrar_usuarios"))
	->name('show_usuario');

	Route::get('/{id}/destroy','UsuarioController@eliminar')
	->middleware(sprintf("autorizacion:%s", "eliminar_usuarios"))
	->name('destroy_user');

	Route::delete('/{usuario}/destroy', 'UsuarioController@changeStatus')->name('destroy_usuario');

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

	Route::get('/{role}', 'RoleController@show')->middleware(sprintf("autorizacion:%s", "Mostrar_role"))
	->name('show_role');

	Route::delete('/{rol}/destroy', 'RoleController@changeStatus')->name('destroy_role');

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

	Route::get('/{partida}', 'PartidaController@show')->middleware(sprintf("autorizacion:%s", "Mostrar_partidas"))
	->name('show_partida');

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

	Route::get('/{medida}', 'MedidaController@show')->middleware(sprintf("autorizacion:%s", "Mostrar_Unidad_de_Medida"))
	->name('show_UnidadaDeMedida');

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

	Route::get('/{id}', 'AreaController@show')->middleware(sprintf("autorizacion:%s", "Mostrar_areas"))
	->name('show_areas');

	Route::get('/{area}/edit', 'AreaController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_areas"))
	->name('edit_areas');

	Route::put('/{area}/update', 'AreaController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_areas"))
	->name('update_areas');

	Route::delete('/{area}/destroy','AreaController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_areas"))
	->name('destroy_areas');

	Route::get('/', 'PermissionController@index')->name('permisos');
});
/* Fin Gestionar Areas*/

/* Rutas: Gestionar Proveedores*/
Route::group(['prefix' => 'proveedores', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ProveedoresController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_proveedores"))
	->name('list_proveedores');

	Route::get('/create', 'ProveedoresController@create')
	->middleware(sprintf("autorizacion:%s", "crear_proveedores"))
	->name('create_proveedor');

	Route::post('/store', 'ProveedoresController@store')
	->middleware(sprintf("autorizacion:%s", "crear_proveedores"))
	->name('store_proveedor');

	Route::get('/edit', 'ProveedoresController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_proveedores"))
	->name('edit_proveedor');

	Route::put('/{proveedor}/update', 'ProveedoresController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_proveedores"))
	->name('update_proveedor');

	Route::get('/{id}/destroy','ProveedoresController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_proveedores"))
	->name('destroy_proveedor');

	// Route::delete('/{medida}/destroy', 'ProveedoresController@changeStatus')->name('destroy_areas');

	// Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin: Gestionar Proveedores*/

/* Rutas: Cierre Gestion*/
Route::group(['prefix' => 'cierregestion', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'CierreGestionController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_cierregestion"))
	->name('list_cierregestion');

	Route::get('/create', 'CierreGestionController@create')
	->middleware(sprintf("autorizacion:%s", "crear_cierregestion"))
	->name('create_cierregestion');

	Route::post('/store', 'CierreGestionController@store')
	->middleware(sprintf("autorizacion:%s", "crear_cierregestion"))
	->name('store_cierregestion');

	Route::get('/edit', 'CierreGestionController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_cierregestion"))
	->name('edit_cierregestion');

	Route::put('/{area}/update', 'CierreGestionController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_cierregestion"))
	->name('update_cierregestion');

	Route::get('/{id}/destroy','CierreGestionController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_cierregestion"))
	->name('destroy_cierregestion');

	// Route::delete('/{medida}/destroy', 'ProveedoresController@changeStatus')->name('destroy_areas');

	// Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin: Gestionar Cierre Gestion*/

/* Rutas: Stock Alamcen*/
Route::group(['prefix' => 'StockAlmacenController', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'StockAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_almacen"))
	->name('list_almacen');

	Route::get('/create', 'StockAlmacenController@create')
	->middleware(sprintf("autorizacion:%s", "crear_almacen"))
	->name('create_almacen');

	Route::post('/store', 'StockAlmacenController@store')
	->middleware(sprintf("autorizacion:%s", "crear_almacen"))
	->name('store_almacen');

	Route::get('/edit', 'StockAlmacenController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_almacen"))
	->name('edit_almacen');

	Route::put('/{almacen}/update', 'StockAlmacenController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_almacen"))
	->name('update_almacen');

	Route::get('/{id}/destroy','StockAlmacenController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_almacen"))
	->name('destroy_almacen');

	// Route::delete('/{medida}/destroy', 'ProveedoresController@changeStatus')->name('destroy_areas');

	// Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin: Gestionar Stock Almacen*/

/* Rutas: Consumo Directo*/
Route::group(['prefix' => 'ConsumoDirecto', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ConsumoDirectoController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_consumodirecto"))
	->name('list_consumodirecto');

	Route::get('/create', 'ConsumoDirectoController@create')
	->middleware(sprintf("autorizacion:%s", "crear_consumodirecto"))
	->name('create_consumodirecto');

	Route::post('/store', 'ConsumoDirectoController@store')
	->middleware(sprintf("autorizacion:%s", "crear_consumodirecto"))
	->name('store_consumodirecto');

	Route::get('/edit', 'ConsumoDirectoController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_consumodirecto"))
	->name('edit_consumodirecto');

	Route::put('/{area}/update', 'ConsumoDirectoController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_consumodirecto"))
	->name('update_consumodirecto');

	Route::get('/{id}/destroy','ConsumoDirectoController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_consumodirecto"))
	->name('destroy_consumodirecto');

	// Route::delete('/{medida}/destroy', 'ProveedoresController@changeStatus')->name('destroy_areas');

	// Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin: Gestionar Consumo Directo*/

/* Rutas: Pedidos*/
Route::group(['prefix' => 'Pedidos', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'PedidosController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_pedidos"))
	->name('list_pedidos');

	Route::get('/create', 'PedidosController@create')
	->middleware(sprintf("autorizacion:%s", "crear_pedidos"))
	->name('create_pedidos');

	Route::post('/store', 'PedidosController@store')
	->middleware(sprintf("autorizacion:%s", "crear_pedidos"))
	->name('store_pedidos');

	Route::get('/edit', 'PedidosController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_pedidos"))
	->name('edit_pedidos');

	Route::put('/{area}/update', 'PedidosController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_pedidos"))
	->name('update_pedidos');

	Route::get('/{id}/destroy','PedidosController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_pedidos"))
	->name('destroy_pedidos');

	// Route::delete('/{medida}/destroy', 'ProveedoresController@changeStatus')->name('destroy_areas');

	// Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin: Gestionar Pedidos*/

/* Rutas: Salidas*/
Route::group(['prefix' => 'Salidas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'SalidasController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_salidas"))
	->name('list_salidas');

	Route::get('/create', 'SalidasController@create')
	->middleware(sprintf("autorizacion:%s", "crear_salidas"))
	->name('create_salidas');

	Route::post('/store', 'SalidasController@store')
	->middleware(sprintf("autorizacion:%s", "crear_salidas"))
	->name('store_salidas');

	Route::get('/edit', 'SalidasController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_salidas"))
	->name('edit_salidas');

	Route::put('/{area}/update', 'SalidasController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_salidas"))
	->name('update_salidas');

	Route::get('/{id}/destroy','SalidasController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_salidas"))
	->name('destroy_salidas');

	// Route::delete('/{medida}/destroy', 'ProveedoresController@changeStatus')->name('destroy_areas');

	// Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin: Gestionar Salidas*/

/* Rutas: Reportes*/
Route::group(['prefix' => 'Reportes', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ReportesController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_reportes"))
	->name('list_reportes');

	Route::get('/create', 'ReportesController@create')
	->middleware(sprintf("autorizacion:%s", "crear_reportes"))
	->name('create_reportes');

	Route::post('/store', 'ReportesController@store')
	->middleware(sprintf("autorizacion:%s", "crear_reportes"))
	->name('store_reportes');

	Route::get('/edit', 'ReportesController@edit')
	->middleware(sprintf("autorizacion:%s", "modificar_reportes"))
	->name('edit_reportes');

	Route::put('/{area}/update', 'ReportesController@update')
	->middleware(sprintf("autorizacion:%s", "modificar_reportes"))
	->name('update_reportes');

	Route::get('/{id}/destroy','ReportesController@destroy')
	->middleware(sprintf("autorizacion:%s", "eliminar_reportes"))
	->name('destroy_reportes');

	// Route::delete('/{medida}/destroy', 'ProveedoresController@changeStatus')->name('destroy_areas');

	// Route::get('/', 'PermissionController@index')->name('permisos');
});
/*Fin: Gestionar Reportes*/

/* Rutas: Reporte Inventario Actual*/
Route::group(['prefix' => 'InventarioActual', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'InventarioActualController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_reporteInventarioActual"))
	->name('list_reportesInventarioActual');
});

/* Rutas: Reporte Inventario Manual*/
Route::group(['prefix' => 'InventarioManual', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'InventarioManualController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_reporteInventarioManual"))
	->name('list_reportesInventarioManual');
});
/*Fin:Reporte Inventario Manual*/

/* Rutas: Reporte Kardex Almacen*/
Route::group(['prefix' => 'Kardex', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'KardexController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_Kardex"))
	->name('list_kardexAlmacen');
});
/*Fin:Reporte Kardex Almacen*/

/* Rutas: Reporte Detallado Stock Almacen*/
Route::group(['prefix' => 'stockAlmacen', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ReporteDetalladoStockAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_ReporteDetalladoStockAlmacen"))
	->name('list_ReporteDetalladoStockAlmacen');
});
/*Fin:Reporte Detallado Stock Almacen*/

/* Rutas: Reporte Fisico Valorado Consumo Directo*/
Route::group(['prefix' => 'fisicoValorado', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'FisicoValoradoConsumoDirectoController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_FisicoValoradoConsumoDirecto"))
	->name('list_FisicoValoradoConsumoDirecto');
});
/*Fin: Fisico Valorado Consumo Directo*/

/* Rutas: Inventario Detallado Almacen*/
Route::group(['prefix' => 'InventarioDetAlmacen', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'InventarioDetalladoAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_InventarioDetalladoAlmacen"))
	->name('list_InventarioDetalladoAlmacen');
});
/*Fin: Inventario Detallado Almacen*/

/* Rutas: Consolidado Fisico Valorado Total*/
Route::group(['prefix' => 'fisicovaloradototal', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ConsolidadoFisicoValoradoTotalController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_ConsolidadoFisicoValoradoTotal"))
	->name('list_ConsolidadoFisicoValoradoTotal');
});
/*Fin: Consolidado Fisico Valorado Total*/

/* Rutas: Reporte Detallado de Ingresos por Consumo Directo*/
Route::group(['prefix' => 'RdIngresosConsumoDirecto', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ReporteDetalladoIngresosConsumoDirectoController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_ReporteDetalladoIngresosConsumoDirecto"))
	->name('list_ReporteDetalladoIngresosConsumoDirecto');
});
/*Fin: Reporte Detallado de Ingresos por Consumo Directo*/

/* Rutas: Fisico Valorado Stock Almacen*/
Route::group(['prefix' => 'FisicoValoradoStockAlmacen', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'FisicoValoradoStockAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_FisicoValoradoStockAlmacen"))
	->name('list_FisicoValoradoStockAlmacen');
});
/*Fin: Fisico Valorado Stock Almacen*/