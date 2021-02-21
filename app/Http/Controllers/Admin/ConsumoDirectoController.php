<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\consumo_directo;
use App\Area;
use App\Articulo;
use App\Http\Requests\ConsumoDirectoRequest;
use DB;

class ConsumoDirectoController extends Controller
{

    public function index()
    {
        $ConsumoDirecto = consumo_directo::all();
        return view('admin.ConsumoDirecto.index',compact('ConsumoDirecto'));
    }

    public function create(){
        $areas = DB::table('AREAS')->where('ESTADO_AREA','=','1')->get();
        $proveedores = DB::table('PROVEEDORES')->where('ESTADO_PROVEEDOR','=','1')->get();
        $Articulos = DB::table('ARTICULO')->where('ESTADO_ARTICULO','=','1')->get();
        return view('admin.ConsumoDirecto.crear',compact('areas','proveedores','Articulos'));
    }

    public function store(ConsumoDirectoRequest $Consumo_Directo){
        
       try{
            DB::beginTransaction();

            $consumo_directo = new consumo_directo;
            $consumo_directo->FECHA = $Consumo_Directo->get('FECHA');
            $consumo_directo->FACTURA = $Consumo_Directo->get('FACTURA');
            $consumo_directo->NRO_ORD_COMPRA = $Consumo_Directo->get('NRO_ORD_COMPRA');
            $consumo_directo->NRO_PREVENTIVO = $Consumo_Directo->get('NRO_PREVENTIVO');
            $consumo_directo->NOTA_INGRESO = $Consumo_Directo->get('NOTA_INGRESO');
            $consumo_directo->COD_AREA = $Consumo_Directo->get('COD_AREA');
            $consumo_directo->DETALLE_CONSUMO = $Consumo_Directo->get('DETALLE_CONSUMO');

            $consumo_directo->save();

            $articulos_sync = array();
            $articulos = $Consumo_Directo->input("articulos");

            if($articulos == null){
              $articulos = array();
            }
            
            foreach ($articulos as $key => $value) {
            // error_log($value);
              $articulos_sync[$value] = array(
                            'CANTIDAD' => $Consumo_Directo->input('cantidad_'.$value)
                            ,'PRECIO_UNITARIO' => ($Consumo_Directo->input('precio_'.$value))
                        );
            }
       
            $consumo_directo->Articulos()->sync($articulos_sync);
            DB::commit();

            return redirect()->route('list_consumodirecto')->with('message', ['success', 'Consumo Directo Agregado Correctamente']);
        }catch(\Exception $e){
            error_log($e->getMessage());
            DB::rollback();
            return redirect()->route('list_consumodirecto')->with('message', ['danger', 'Error al  Agregar el Consumo Directo']);
        }
    }

    public function show($id){
        //
    }

    public function edit($id){
        $consumo_directo = consumo_directo::findOrFail($id);
        $areas = DB::table('AREAS')->where('ESTADO_AREA','=','1')->get();
        $Articulos = DB::table('ARTICULO')->where('ESTADO_ARTICULO','=','1')->get();
        $proveedores = DB::table('PROVEEDORES')->where('ESTADO_PROVEEDOR','=','1')->get();
        return view('admin.ConsumoDirecto.editar', compact('consumo_directo','areas','Articulos','proveedores'));
    }

    public function update(ConsumoDirectoRequest $request_consumo, consumo_directo $consumo_directo){
        
       try{
                DB::beginTransaction();
                error_log('pruebitaa111');
                $consumo_directo->FECHA = $request_consumo->get('FECHA');
                $consumo_directo->FACTURA = $request_consumo->get('FACTURA');
                $consumo_directo->NRO_ORD_COMPRA = $request_consumo->get('NRO_ORD_COMPRA');
                $consumo_directo->NRO_PREVENTIVO = $request_consumo->get('NRO_PREVENTIVO');
                $consumo_directo->NOTA_INGRESO = $request_consumo->get('NOTA_INGRESO');
                $consumo_directo->COD_AREA = $request_consumo->get('COD_AREA');
                $consumo_directo->DETALLE_CONSUMO = $request_consumo->get('DETALLE_CONSUMO');
                error_log('pruebita222');

                $consumo_directo->save();
                error_log('pruebita444444444');

                $articulos_sync = array();
                $articulos = $request_consumo->input("articulos");
                // dd($articulos);
                if($articulos == null){
                  $articulos = array();
                }
                error_log('luchiot');
                
                foreach ($articulos as $key => $value) {
                // error_log($value);
                  $articulos_sync[$value] = array(
                                'CANTIDAD' => $request_consumo->input('cantidad_'.$value)
                                ,'PRECIO_UNITARIO' => ($request_consumo->input('precio_'.$value))
                            );
                }
                error_log('luchitoasd');
                // dd($articulos_sync);
                $consumo_directo->Articulos()->sync($articulos_sync);
                DB::commit();

                return redirect()->route('list_consumodirecto')->with('message', ['success', 'Consumo Directo Modificado Correctamente']);
            }catch(\Exception $e){
                error_log('aasda');

                error_log($e->getMessage());
                DB::rollback();
                return redirect()->route('list_consumodirecto')->with('message', ['danger', 'Error al  Modificar el Consumo Directo']);
            }
    }

    public function destroy( consumo_directo $consumoDirecto){
        
        $estado = true;

        if ($consumoDirecto->ESTADO_COMPRA) {
          $estado = false;
        }

        $consumoDirecto->ESTADO_COMPRA = $estado;
        $consumoDirecto->save();

        if ($estado) {
          return redirect()->route('list_consumodirecto')->with('message', ['success', 'Consumo Directo habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_consumodirecto')->with('message', ['success', 'Consumo Directo Desabilitado Correctamente!']);
        }
    }
}
