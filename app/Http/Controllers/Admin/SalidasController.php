<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\salida;
use App\pedido;
use App\Area;
use App\Http\Requests\SalidaRequest;
use DB;
class SalidasController extends Controller
{

    public function index()
    {
        $Salidas = salida::all();
        return view('admin.Salidas.index',compact('Salidas'));
    }

    public function ValidarPedido($id){

        $pedido = pedido::findOrFail($id);
        $Articulos = DB::table('ARTICULO')->where('ESTADO_ARTICULO','=','1')->get();

        return view('admin.Salidas.validar', compact('pedido','Articulos'));
    }

    public function create(){

        $pedidos = pedido::where('VALIDADO','=','0')->get();
     
        return view('admin.Salidas.ListaPedidosPendientes',compact('pedidos'));
    }

    public function store(SalidaRequest $request_salida, pedido $pedido){

        // dd($pedido);
         try{
            DB::beginTransaction();

            $pedido->VALIDADO = TRUE;

            $pedido->save();

            $Salida = new salida;

            $Salida->COD_PEDIDO = $pedido->COD_PEDIDO;
            $Salida->COD_AREA = $pedido->COD_AREA;
            $Salida->FECHA = date('Y-m-d');
            // $Salida->DETALLE_SALIDA = $request_salida->get('DETALLE_SALIDA');
            $Salida->DETALLE_SALIDA = 'va de nuevo';

            $Salida->save();

            $articulos_sync = array();
            $articulos = $request_salida->input("articulos");

            // dd($articulos);

            if($articulos == null){
              $articulos = array();
            }

            foreach ($articulos as $key => $value) {
            // error_log($value);
              $articulos_sync[$value] = array(
                            'CANTIDAD' => $request_salida->input('cantidad_'.$value)
                        );
            }
       
            $Salida->Articulos()->sync($articulos_sync);
            DB::commit();

            return redirect()->route('list_salidas')->with('message', ['success', 'Salida Validada Correctamente']);
        }catch(\Exception $e){
            error_log($e->getMessage());
            DB::rollback();
            return redirect()->route('list_salidas')->with('message', ['danger', 'Error al Validar la salida del Pedido']);
        }
    }

    public function show($id){
        
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function changeStatus(salida $salida)
    {
        $estado = true;

        if ($salida->ESTADO_SALIDA) {
          $estado = false;
        }

        $salida->ESTADO_SALIDA = $estado;
        $salida->save();

        if ($estado) {
          return redirect()->route('list_salidas')->with('message', ['success', 'Salida habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_salidas')->with('message', ['success', 'Salida Desabilitado Correctamente!']);
        }
    }
}
