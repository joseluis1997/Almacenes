<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PartidaRequest;
use App\Http\Controllers\Controller;
use App\Partida;
use DB;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $partidas = DB::table('PARTIDA')->get();
        return view('admin.partida.index',compact('partidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partidas = Partida::all()->where('ESTADO_PARTIDA', '=', 1);
        return view('admin.partida.crear', compact('partidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartidaRequest $request)
    {
        $partida = $request->all();
        Partida::create($partida);
        return redirect()->route('list_partidas')->with('message', ['success', 'Partida Registrado Correctamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partida = Partida::find($id);
        return view('admin.partida.show',['partidas' => $partida]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partida $partida)
    {
        if ($partida->COD_PARTIDA == 1) {
             abort(403, 'Acción no autorizada.');
        }

        $partidas = Partida::all()->where('ESTADO_PARTIDA', '=', 1)->where('COD_PARTIDA', '<>', $partida->COD_PARTIDA);
        return view('admin.partida.editar', compact('partida', 'partidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartidaRequest $request,Partida $partida)
    {
        $partida->update($request->validated());
        
        return redirect()->route('list_partidas')->with('message',['success','Partida Actualizado Correctamente!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $partida = Partida::findOrFail($id);
    //     $partida->delete();
    //     return redirect()->route('list_partidas')->with('message',['danger','Partida Eliminado Correctamente!!']);
    // }

    public function changeStatus(Partida $partida)
    {
        $estado = true;

        if ($partida->ESTADO_PARTIDA) {
          $estado = false;
        }

        $partida->ESTADO_PARTIDA = $estado;
        $partida->save();
        
        if ($estado) {
          return redirect()->route('list_partidas')->with('message', ['success', 'Partida habilitado Correctamente!']);  
        }
        else{
          return redirect()->route('list_partidas')->with('message', ['success', 'Partida Desabilitado Correctamente!']);
        }
    }
}
