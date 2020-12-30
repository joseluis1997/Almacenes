<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProveedorRequest;
use App\Http\Controllers\Controller;
use App\proveedor;
use DB;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedores = DB::table('PROVEEDORES')->get();
        return view('admin.proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proveedores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        $proveedor = $request->all();
        proveedor::create($proveedor);
        return redirect()->route('list_proveedores')->with('message', ['success', 'Proveedor Registrado Correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_proveedor = proveedor::find($id);
        return view('admin.proveedores.show',['show_proveedor' => $show_proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = proveedor::findOrFail($id);
        return view('admin.proveedores.editar', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorRequest $request, proveedor $proveedor)
    {
        $proveedor->update($request->validated());
        
        return redirect()->route('list_proveedores')->with('message',['success','Proveedor Actualizado Correctamente!!']);
    }

    public function changeStatus(proveedor $proveedor)
    {
        $estado = true;

        if ($proveedor->ESTADO_PROVEEDOR) {
          $estado = false;
        }

        $proveedor->ESTADO_PROVEEDOR = $estado;
        $proveedor->save();

        if ($estado) {
          return redirect()->route('list_proveedores')->with('message', ['success', 'Proveedor habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_proveedores')->with('message', ['success', 'Proveedor Desabilitado Correctamente!']);
        }
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
