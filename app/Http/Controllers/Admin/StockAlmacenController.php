<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\compra_stock;
use App\Articulo;
use DB;
use App\Http\Requests\CompraStockAlmacenRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class StockAlmacenController extends Controller
{

    public function index()
    {
        // $compras= compra_stock::all();

        $compras = compra_stock::leftJoin(DB::raw('(SELECT COD_COMPRA_STOCK, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_COMPRA_STOCK GROUP BY COD_COMPRA_STOCK) AS detalle'), function ($join) {
            $join->on('detalle.COD_COMPRA_STOCK', '=', 'COMPRA_STOCKS.COD_COMPRA_STOCK');
        })->get();

        return view('admin.StockAlmacen.index',compact('compras'));
    }

    public function create(){
        $proveedores = DB::table('PROVEEDORES')->where('ESTADO_PROVEEDOR','=','1')->get();
        $areas = DB::table('AREAS')->where('ESTADO_AREA','=','1')->get();
        $Articulos = DB::table('ARTICULO')->where('ESTADO_ARTICULO','=','1')->get();
        return view('admin.StockAlmacen.crear',compact('proveedores','areas','Articulos'));
    }

    public function store(CompraStockAlmacenRequest $compra_request){

        try{
            DB::beginTransaction();

            $compra = new compra_stock;
            // $compra->COD_COMPRA_STOCK = $compra_request->get('COD_COMPRA_STOCK');
            $compra->COD_AREA = $compra_request->get('COD_AREA');
            $compra->COD_PROVEEDOR = $compra_request->get('COD_PROVEEDOR');
            $compra->COD_USUARIO = Auth::user()->id;
            $compra->NRO_ORD_COMPRA = $compra_request->get('NRO_ORD_COMPRA');
            $compra->NRO_PREVENTIVO = $compra_request->get('NRO_PREVENTIVO');
            $compra->COMPROBANTE = $compra_request->get('COMPROBANTE');
            $compra->FECHA = $compra_request->get('FECHA');
            $compra->DETALLE_COMPRA = $compra_request->get('DETALLE_COMPRA');
            $compra->save();

            $articulos_sync = array();
            $articulos = $compra_request->input("articulos");

            // dd($articulos);

            if($articulos == null){
              $articulos = array();
            }

            foreach ($articulos as $key => $value) {
            // error_log($value);
              $articulos_sync[$value] = array(
                            'CANTIDAD' => $compra_request->input('cantidad_'.$value)
                            ,'PRECIO_UNITARIO' => ($compra_request->input('precio_'.$value))
                        );
            }
       
            $compra->Articulos()->sync($articulos_sync);
            DB::commit();

            return redirect()->route('list_almacen')->with('message', ['success', 'Compra Stock Agregado Correctamente']);
        }catch(\Exception $e){
            error_log($e->getMessage());
            DB::rollback();
            return redirect()->route('list_almacen')->with('message', ['danger', 'Error al  Agregar Compra Stock']);
        }

    }

    public function show($id){
        $comprita = compra_stock::find($id);
        $detalles = DB::table('DETALLE_COMPRA_STOCK as d')
        ->join('ARTICULO as a','d.COD_ARTICULO','=','a.COD_ARTICULO')
        ->select('a.NOM_ARTICULO','d.COD_COMPRA_STOCK','d.CANTIDAD','d.PRECIO_UNITARIO')
        ->where('d.COD_COMPRA_STOCK','=',$id)
        ->get();
        return view('admin.StockAlmacen.show',compact('comprita','detalles'));
    }

    public function changeStatus(compra_stock $compraStock){
        $estado = true;

        if ($compraStock->ESTADO_COMPRA) {
          $estado = false;
        }

        $compraStock->ESTADO_COMPRA = $estado;
        $compraStock->save();

        if ($estado) {
          return redirect()->route('list_almacen')->with('message', ['success', 'Compra Stock habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_almacen')->with('message', ['success', 'Compra Stock Desabilitado Correctamente!']);
        }
    }
}
