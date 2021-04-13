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
// pruebas

	// Route::get('/', function(){

	// 	$pedido = App\pedido::findOrFail(8);
	//     return $pedido->Area;
		
	// });

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
	// $user = App\User::findOrFail(1);
	// dd($user->consumo_directos);
	// dd($CONSUMO->ConsumoDirectos);
	// return $Salidas->salida;
    return redirect('/seguridad/login');
});

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');

Route::get('/index', 'Admin\AdminController@index')
	->middleware('auth');

/*Rutas Usuarios*/
Route::group(['prefix' => 'users', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	
  Route::post('/get-all-articulos', 'AdminController@articulosJson')
  ->name('getAllArticulosJson');

  Route::get('/index', 'UsuarioController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_usuarios"))
  	->name('list_users');

	Route::get('/create', 'UsuarioController@crear')
	->middleware(sprintf("autorizacion:%s", "Crear_usuarios"))
	->name('create_users');

	Route::post('/store', 'UsuarioController@guardar')
	->middleware(sprintf("autorizacion:%s", "Crear_usuarios"))
	->name('store_users');

	Route::get('/{id}/edit', 'UsuarioController@editar')
	->middleware(sprintf("autorizacion:%s", "Modificar_usuarios"))
	->name('edit_user');
	Route::put('/{id}/update', 'UsuarioController@actualizar')
	->middleware(sprintf("autorizacion:%s", "Modificar_usuarios"))
	->name('user_update');


	Route::get('/{user}', 'UsuarioController@show')->middleware(sprintf("autorizacion:%s", "Ver_usuarios"))
	->name('show_usuario');

	// Route::get('/{id}/destroy','UsuarioController@eliminar')
	// ->middleware(sprintf("autorizacion:%s", "Deshabilitar_usuarios"))
	// ->name('destroy_user');

	Route::delete('/{usuario}/destroy', 'UsuarioController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_usuarios"))
	->name('destroy_user');
});

/*Rutas roles*/
Route::group(['prefix' => 'roles', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'RoleController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_roles"))
	->name('list_roles');

	Route::get('/create', 'RoleController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_roles"))
	->name('create_roles');

	Route::post('/store', 'RoleController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_roles"))
	->name('store_roles');

	Route::get('/{role}/edit', 'RoleController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_roles"))
	->name('edit_roles');

	Route::put('/{role}/update', 'RoleController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_roles"))
	->name('update_roles');

	Route::get('/{role}', 'RoleController@show')->middleware(sprintf("autorizacion:%s", "Ver_roles"))
	->name('show_role');

	Route::delete('/{rol}/destroy', 'RoleController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_roles"))
	->name('destroy_roles');

	// Route::get('/{id}/destroy','RoleController@destroy')
	// ->middleware(sprintf("autorizacion:%s", "eliminar_roles"))
	// ->name('destroy_roles');
});

/* Rutas de Partidas*/

Route::group(['prefix' => 'partidas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'PartidaController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_partidas"))
	->name('list_partidas');

	Route::get('/create', 'PartidaController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_partidas"))
	->name('create_partidas');

	Route::post('/store', 'PartidaController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_partidas"))
	->name('store_partidas');

	Route::get('/{partida}/edit', 'PartidaController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_partidas"))
	->name('edit_partidas');

	Route::put('/{partida}/update', 'PartidaController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_partidas"))
	->name('update_partidas');

	Route::get('/{partida}', 'PartidaController@show')->middleware(sprintf("autorizacion:%s", "Ver_partidas"))
	->name('show_partida');

	Route::delete('/{partida}/destroy', 'PartidaController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_partidas"))
	->name('destroy_partida');
	// Route::get('/{partida}/destroy','PartidaController@destroy')
	// ->middleware(sprintf("autorizacion:%s", "eliminar_partidas"))
	// ->name('destroy_partidas');

});

/* Rutas Articulos*/
Route::group(['prefix' => 'articulos', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ArticuloController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_articulos"))
	->name('list_articulos');

	Route::get('/create', 'ArticuloController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_articulos"))
	->name('create_articulos');

	Route::post('/store', 'ArticuloController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_articulos"))
	->name('store_articulos');

	Route::get('/{id}', 'ArticuloController@show')
	->middleware(sprintf("autorizacion:%s", "Ver_articulos"))
	->name('show_articulo');

	Route::get('/{articulo}/edit', 'ArticuloController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_articulos"))
	->name('edit_articulos');

	Route::put('/{articulo}/update', 'ArticuloController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_articulos"))
	->name('update_articulos');


	Route::delete('/{articulo}/destroy', 'ArticuloController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_articulos"))
	->name('destroy_articulos');

	// Route::get('/{articulo}/destroy','ArticuloController@destroy')
	// ->middleware(sprintf("autorizacion:%s", "eliminar_articulos"))
	// ->name('destroy_articulos');
});

/*Rutas Medidas*/
Route::group(['prefix' => 'medidas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'MedidaController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_Unidades_de_Medidas"))
	->name('list_medidas');

	Route::get('/create', 'MedidaController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_Unidades_de_Medidas"))
	->name('create_medidas');

	Route::post('/store', 'MedidaController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_Unidades_de_Medidas"))
	->name('store_medidas');

	Route::get('/{id}/edit', 'MedidaController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_Unidades_de_Medidas"))
	->name('edit_medidas');

	Route::put('/{medida}/update', 'MedidaController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_Unidades_de_Medidas"))
	->name('update_medidas');

	Route::get('/{medida}', 'MedidaController@show')->middleware(sprintf("autorizacion:%s", "Ver_Unidades_de_Medidas"))
	->name('show_UnidadaDeMedida');

	Route::delete('/{medida}/destroy', 'MedidaController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_Unidades_de_Medidas"))
	->name('destroy_medidas');
	// Route::get('/{id}/destroy','MedidaController@destroy')
	// ->middleware(sprintf("autorizacion:%s", "eliminar_medidas"))
	// ->name('destroy_medidas');

});

/*Rutas Gestionar Areas*/
Route::group(['prefix' => 'areas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'AreaController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_areas"))
	->name('list_areas');

	Route::get('/create', 'AreaController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_areas"))
	->name('create_areas');

	Route::post('/store', 'AreaController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_areas"))
	->name('store_areas');

	Route::get('/{id}', 'AreaController@show')->middleware(sprintf("autorizacion:%s", "Ver_areas"))
	->name('show_areas');

	Route::get('/{area}/edit', 'AreaController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_areas"))
	->name('edit_areas');

	Route::put('/{area}/update', 'AreaController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_areas"))
	->name('update_areas');

	Route::delete('/{area}/destroy','AreaController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_areas"))
	->name('destroy_areas');
	
	// Route::delete('/{area}/destroy', 'AreaController@changeStatus')->name('eliminar_areas');
	
});

/* Rutas: Gestionar Proveedores*/
Route::group(['prefix' => 'proveedores', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ProveedoresController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_proveedores"))
	->name('list_proveedores');

	Route::get('/create', 'ProveedoresController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_proveedores"))
	->name('create_proveedor');

	Route::post('/store', 'ProveedoresController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_proveedores"))
	->name('store_proveedor');

	Route::get('/{id}/edit', 'ProveedoresController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_proveedores"))
	->name('edit_proveedor');

	Route::get('/{id}', 'ProveedoresController@show')->middleware(sprintf("autorizacion:%s", "Ver_Proveedores"))
	->name('show_proveedor');

	Route::put('/{proveedor}/update', 'ProveedoresController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_proveedores"))
	->name('update_proveedor');

	Route::delete('/{proveedor}/destroy', 'ProveedoresController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_proveedores"))
	->name('destroy_proveedor');

});


/* Rutas: Stock Alamcen*/
Route::group(['prefix' => 'StockAlmacenController', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'StockAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_compras"))
	->name('list_almacen');

	Route::get('/create', 'StockAlmacenController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_compras"))
	->name('create_almacen');

	Route::post('/store', 'StockAlmacenController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_compras"))
	->name('store_almacen');

	Route::get('/edit', 'StockAlmacenController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_compras"))
	->name('edit_almacen');

	Route::get('/{id}', 'StockAlmacenController@show')->middleware(sprintf("autorizacion:%s", "Verdetalle_compras"))
	->name('show_almacen');

	Route::put('/{almacen}/update', 'StockAlmacenController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_compras"))
	->name('update_almacen');

	Route::delete('/{compraStock}/destroy', 'StockAlmacenController@changeStatus')->middleware(sprintf("autorizacion:%s", "Deshabilitar_compras"))->name('destroy_almacen');

});

/* Rutas: Consumo Directo*/
Route::group(['prefix' => 'ConsumoDirecto', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

	Route::get('/index', 'ConsumoDirectoController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_consumos_directos"))
	->name('list_consumodirecto');

	Route::get('/create', 'ConsumoDirectoController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_consumos_directos"))
	->name('create_consumodirecto');

	Route::post('/store', 'ConsumoDirectoController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_consumos_directos"))
	->name('store_consumodirecto');

	Route::get('{id}/edit', 'ConsumoDirectoController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_consumos_directos"))
	->name('edit_consumodirecto');

	Route::put('/{consumo_directo}/update', 'ConsumoDirectoController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_consumos_directos"))
	->name('update_consumodirecto');

	Route::get('/{id}', 'ConsumoDirectoController@show')
	->middleware(sprintf("autorizacion:%s", "VerDetalles_consumos_directos"))
	->name('show_consumoD');

	Route::delete('/{consumoDirecto}/destroy','ConsumoDirectoController@destroy')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_consumos_directos"))
	->name('destroy_consumodirecto');

});

/* Rutas: Pedidos*/
Route::group(['prefix' => 'Pedidos', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'PedidosController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_pedidos"))
	->name('list_pedidos');

	Route::get('/create', 'PedidosController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_pedidos"))
	->name('create_pedidos');

	Route::post('/store', 'PedidosController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_pedidos"))
	->name('store_pedidos');

	Route::get('/{id}/edit', 'PedidosController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_pedidos"))
	->name('edit_pedidos');

	Route::put('/{pedido}/update', 'PedidosController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_pedidos"))
	->name('update_pedidos');

	Route::get('/{id}', 'PedidosController@show')->middleware(sprintf("autorizacion:%s", "VerDetalle_pedidos"))
	->name('show_pedidos');

	Route::delete('/{pedido}/destroy', 'PedidosController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_pedidos"))
	->name('destroy_pedidos');

});

/* Rutas: Salidas*/
Route::group(['prefix' => 'Salidas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	
	Route::get('/index', 'SalidasController@index')
	->middleware(sprintf("autorizacion:%s", "Listar_salidas"))
	->name('list_salidas');

	Route::get('/create', 'SalidasController@create')
	->middleware(sprintf("autorizacion:%s", "Crear_salidas"))
	->name('create_salidas');

	Route::post('{pedido}/store', 'SalidasController@store')
	->middleware(sprintf("autorizacion:%s", "Crear_salidas"))
	->name('store_salidas');

	Route::get('{id}/edit', 'SalidasController@edit')
	->middleware(sprintf("autorizacion:%s", "Modificar_salidas"))
	->name('edit_salidas');

	Route::put('/{salida}/update', 'SalidasController@update')
	->middleware(sprintf("autorizacion:%s", "Modificar_salidas"))
	->name('update_salidas');

	Route::delete('/{salida}/destroy','SalidasController@changeStatus')
	->middleware(sprintf("autorizacion:%s", "Deshabilitar_salidas"))
	->name('destroy_salidas');


	Route::get('/{id}', 'SalidasController@show')
	->middleware(sprintf("autorizacion:%s", "VerDetalle_salidas"))
	->name('show_salidas');

	Route::get('/{id}/pendientes', 'SalidasController@MostrarPedidosPendientes')
	->middleware(sprintf("autorizacion:%s", "VerDetalle_pedidos_Pendientes"))
	->name('mostrar_pedidosPendientes');

	Route::get('/{id}/Validar','SalidasController@ValidarPedido')
	->middleware(sprintf("autorizacion:%s", "Validar_Salida_Pedido"))
	->name('Validar_Pedido');
});

/* Rutas: Reportes*/
Route::group(['prefix' => 'Reportes', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ReportesController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_reportes"))
	->name('list_reportes');
});

/* Rutas: Reporte Inventario Actual*/
Route::group(['prefix' => 'InventarioActual', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

	Route::get('/index/inventario', 'InventarioActualController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_reporteInventarioActual"))
	->name('list_reportesInventarioActual');

	Route::post('/create_report', 'InventarioActualController@createReport')
	->middleware(sprintf("autorizacion:%s", "accesso_reporteInventarioActual"))
	->name('create_report_InventarioActual');
});

/* Rutas: Reporte Detallado Inventario Actual*/
Route::group(['prefix' => 'InventarioDetAlmacen', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index/inventarioDetallado', 'InventarioDetalladoAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_reporteInventarioActualDetallado"))
	->name('list_InventarioDetalladoAlmacen');

	Route::post('/create_report', 'InventarioDetalladoAlmacenController@createReport')
	->middleware(sprintf("autorizacion:%s", "accesso_reporteInventarioActualDetallado"))
	->name('create_report_InventarioDetalladoAlmacen');

});

/* Rutas: Reporte Fisico Valorado Consumos Directos*/
Route::group(['prefix' => 'fisicoValorado', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index/fisicoValorado', 'FisicoValoradoConsumoDirectoController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_FisicoValoradoConsumoDirectos"))
	->name('list_FisicoValoradoConsumoDirecto');

	Route::post('/InventarioActual', 'FisicoValoradoConsumoDirectoController@createReport')
	->middleware(sprintf("autorizacion:%s", "accesso_FisicoValoradoConsumoDirectos"))
	->name('create_report__FisicoValoradoConsumoDirecto');
});

/* Rutas: Reporte Detallado Consumo Directo*/
Route::group(['prefix' => 'RdIngresosConsumoDirecto', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ReporteDetalladoIngresosConsumoDirectoController@index')
	->middleware(sprintf("autorizacion:%s", "acesso_ReporteDetalladoConsumoDirectos"))
	->name('list_ReporteDetalladoIngresosConsumoDirecto');

	Route::post('/create_report', 'ReporteDetalladoIngresosConsumoDirectoController@createReport')
	->middleware(sprintf("autorizacion:%s", "acesso_ReporteDetalladoConsumoDirectos"))
	->name('create_report_ReporteDetalladoIngresosConsumoDirecto');
});

/* Rutas: Fisico Valorado Compras*/
Route::group(['prefix' => 'FisicoValoradoStockAlmacen', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'FisicoValoradoStockAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_FisicoValoradoCompras"))
	->name('list_FisicoValoradoStockAlmacen');

	Route::post('/crear-reporte', 'FisicoValoradoStockAlmacenController@createReport')
	->middleware(sprintf("autorizacion:%s", "accesso_FisicoValoradoCompras"))
	->name('create_report_FisicoValoradoStockAlmacen');

});

/* Rutas: Reporte Detallado de Compras*/
Route::group(['prefix' => 'stockAlmacen', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ReporteDetalladoStockAlmacenController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_ReporteDetalladoCompras"))
	->name('list_ReporteDetalladoStockAlmacen');

	Route::post('/create_report', 'ReporteDetalladoStockAlmacenController@createReport')
	->middleware(sprintf("autorizacion:%s", "accesso_ReporteDetalladoCompras"))
	->name('create_report_ReporteDetalladoStockAlmacen');
	
});

/* Rutas: Reporte Kardex */
Route::group(['prefix' => 'Kardex', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'KardexController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_Kardex"))
	->name('list_kardexAlmacen');

	Route::post('/create_kardex', 'KardexController@Kardex')
	->middleware(sprintf("autorizacion:%s", "accesso_Kardex"))
	->name('create_kardex');
});

/* Rutas: Consolidado Fisico Valorado Total*/
Route::group(['prefix' => 'fisicovaloradototal', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ConsolidadoFisicoValoradoTotalController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_ConsolidadoFisicoValoradoTotal"))
	->name('list_ConsolidadoFisicoValoradoTotal');

	Route::post('/create_report', 'ConsolidadoFisicoValoradoTotalController@RepConsolidadoValoradoTotal')
	->middleware(sprintf("autorizacion:%s", "accesso_ConsolidadoFisicoValoradoTotal"))
	->name('create_report_ReporteConsolidadoValoradoTotal');
});

/* Rutas: Reportes por Area */
Route::group(['prefix' => 'AreaEgresosAalidas', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/index', 'ReporteAreaController@index')
	->middleware(sprintf("autorizacion:%s", "accesso_ReporteAreas"))
	->name('list_area_egresos_salidas');

	Route::post('/create_report', 'ReporteAreaController@createReport')
	->middleware(sprintf("autorizacion:%s", "accesso_ReporteAreas"))
	->name('create_report_area_egresos_salidas');
});

