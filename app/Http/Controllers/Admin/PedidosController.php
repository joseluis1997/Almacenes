<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pedido;
use App\Articulo;
use App\Http\Requests\PedidosRequest;
use DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = pedido::all();
        $articulos = Articulo::all();
        //return $articulos;
        return view('admin.Pedidos.index',compact('articulos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = DB::table('AREAS')->where('ESTADO_AREA','=','1')->get();
        $Articulos = DB::table('ARTICULO')->where('ESTADO_ARTICULO','=','1')->get();
        return view('admin.Pedidos.crear',compact('areas','Articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosRequest $pedido_request)
    {

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
