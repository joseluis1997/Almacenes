<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pedido;
use App\Articulo;
use App\Http\Requests\PedidosRequest;
use DB;
use Illuminate\Support\Collection;

class PedidosController extends Controller
{
    
    public function index()
    {
        $pedidos = pedido::all();
        return view('admin.Pedidos.index',compact('pedidos')); 
    }

    public function create()
    {
        $areas = DB::table('AREAS')->where('ESTADO_AREA','=','1')->get();
        $Articulos = DB::table('ARTICULO')->where('ESTADO_ARTICULO','=','1')->get();
        return view('admin.Pedidos.crear',compact('areas','Articulos'));
    }

   
    public function store(PedidosRequest $pedido_request)
    {
        // dd($pedido_request);
        try{
            DB::beginTransaction();

            $pedido = new pedido;
            $pedido->COD_AREA = $pedido_request->get('COD_AREA');
            $pedido->FECHA = $pedido_request->get('FECHA');
            $pedido->DETALLE_PEDIDO = $pedido_request->get('DETALLE_PEDIDO');

            $pedido->save();

            $articulos_sync = array();
            $articulos = $pedido_request->input("articulos");

            // dd($articulos);

            if($articulos == null){
              $articulos = array();
            }

            foreach ($articulos as $key => $value) {
            // error_log($value);
              $articulos_sync[$value] = array(
                            'CANTIDAD' => $pedido_request->input('cantidad_'.$value)
                        );
            }
       
            $pedido->Articulos()->sync($articulos_sync);
            DB::commit();

            return redirect()->route('list_pedidos')->with('message', ['success', 'Pedido Agregado Correctamente']);
        }catch(\Exception $e){
            error_log($e->getMessage());
            DB::rollback();
            return redirect()->route('list_pedidos')->with('message', ['danger', 'Error al  Agregar el Pedido']);
        }
    }

  
    public function show($id){
        $pedido = pedido::find($id);
        $detallesPedido = DB::table('DETALLE_PEDIDO as d')
        ->join('ARTICULO as a','d.COD_ARTICULO','=','a.COD_ARTICULO')
        ->select('a.NOM_ARTICULO','d.CANTIDAD')
        ->where('d.COD_PEDIDO','=',$id)
        ->get();
        return view('admin.Pedidos.show',compact('pedido','detallesPedido'));
    }


    public function edit($id)
    {
        $pedidos = pedido::findOrFail($id);
        $areas = DB::table('AREAS')->where('ESTADO_AREA','=','1')->get();
        $Articulos = DB::table('ARTICULO')->where('ESTADO_ARTICULO','=','1')->get();
        return view('admin.Pedidos.editar', compact('pedidos','areas','Articulos'));
    }

  
    public function update(PedidosRequest $pedido_request, pedido $pedido)
    {
        // dd($pedido->Articulos);

        try{
            DB::beginTransaction();

            $pedido->COD_AREA = $pedido_request->get('COD_AREA');
            $pedido->FECHA = $pedido_request->get('FECHA');
            $pedido->DETALLE_PEDIDO = $pedido_request->get('DETALLE_PEDIDO');

            $pedido->save();

            $articulos_sync = array();
            $articulos = $pedido_request->input("articulos");

            // dd($articulos);

            if($articulos == null){
              $articulos = array();
            }

            foreach ($articulos as $key => $value) {
            // error_log($value);
              $articulos_sync[$value] = array(
                            'CANTIDAD' => $pedido_request->input('cantidad_'.$value)
                        );
            }
       
            $pedido->Articulos()->sync($articulos_sync);
            DB::commit();

            return redirect()->route('list_pedidos')->with('message', ['success', 'Pedido Modificado Correctamente']);
        }catch(\Exception $e){
            error_log($e->getMessage());
            DB::rollback();
            return redirect()->route('list_pedidos')->with('message', ['danger', 'Error al  Modificar el Pedido']);
        }
    }

   
    public function changeStatus(pedido $pedido)
    {
        $estado = true;

        if ($pedido->ESTADO_PEDIDO) {
          $estado = false;
        }

        $pedido->ESTADO_PEDIDO = $estado;
        $pedido->save();

        if ($estado) {
          return redirect()->route('list_pedidos')->with('message', ['success', 'Pedido habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_pedidos')->with('message', ['success', 'Pedido Desabilitado Correctamente!']);
        }
    }
}
