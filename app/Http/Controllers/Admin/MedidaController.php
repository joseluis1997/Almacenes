<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MedidaRequest;
use Illuminate\Http\Request;
use App\Medida;
use DB;
use App\Http\Controllers\Controller;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $UnidadMedida = Medida::all();
        $UnidadMedida = DB::table('MEDIDA')->get();//->where('ESTADO_MEDIDA','=',1);
        return view('admin.medida.index', [ 'medidas' => $UnidadMedida]);
    }

    // public function index2($item ,$valor)
    // {
    //     return $item;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medida.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedidaRequest $request)
    {
        $input = $request->all();
        Medida::create($input);

        return redirect()->route('list_medidas')->with('message', ['success', 'Unidad de Medida Registrado Correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $UnidadMedida = Medida::find($id);
        return view('admin.medida.show',['medidas' => $UnidadMedida]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medida = Medida::findOrFail($id);
        return view('admin.medida.editar',compact('medida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedidaRequest $request, Medida $medida)
    {
        $medida->update($request->validated());
        
        return redirect()->route('list_medidas')->with('message',['success','Unidad de Medida Actualizado Correctamente!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $medida = Medida::findOrFail($id);
    //     $medida->delete();
    //     return redirect()->route('list_medidas')->with('message',['danger','Unidad de Medida Eliminado Correctamente!!']);
    // }
    

    public function changeStatus(Medida $medida)
    {
        $estado = true;

        if ($medida->ESTADO_MEDIDA) {
          $estado = false;
        }

        $medida->ESTADO_MEDIDA = $estado;
        $medida->save();

        if ($estado) {
          return redirect()->route('list_medidas')->with('message', ['success', 'Unidad de Medida habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_medidas')->with('message', ['success', 'Unidad de Medida Desabilitado Correctamente!']);
        }
    }

}
