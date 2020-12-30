<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use DB;
use App\Http\Requests\ArticuloRequest;
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulo = Articulo::all();
        // dd($articulo[0]->Medida);
        return view('admin.articulos.index',[ 'articulos' => $articulo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partidaArticulo = DB::table('PARTIDA')->where('ESTADO_PARTIDA','=','1')->get();
        $unidadMedidaArticulo = DB::table('MEDIDA')->where('ESTADO_MEDIDA','=','1')->get();
        return view ('admin.articulos.crear',[ 'unidadMedidas' => $unidadMedidaArticulo],[ 'partidas' => $partidaArticulo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $articulo_request)
    {
        
        try {

          Articulo::create($articulo_request->input());
          return redirect()->route('list_articulos')->with('message', ['success', 'Nuevo Articulo creado Correctamente']);
        } catch (\Illuminate\Database\QueryException $e) {
            error_log($e->getMessage());
          return redirect()->route('list_articulos')->with('message', ['danger', 'Erro al crear el nuevo Articulo']);
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
         return view('admin.articulos.show',['articulo'=>Articulo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $articulos = Articulo::all()->where('ESTADO_ARTICULO', '=', 1)->where('COD_ARTICULO', '<>', $articulo->COD_ARTICULO);
        $unidadesMedidaArticulo = DB::table('MEDIDA')->where('ESTADO_MEDIDA','=','1')->get();
        $partidas = DB::table('PARTIDA')->where('ESTADO_PARTIDA','=','1')->get();
        return view('admin.articulos.editar', compact(['articulo', 'articulos'],'unidadesMedidaArticulo','partidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloRequest $articulo_request, Articulo $articulo)
    {

        try {            
            $articulo->fill($articulo_request->input())->save();
            return redirect()->route('list_articulos')->with('message', ['success', 'Articulo Modificado Correctamente!']);
        } catch (\Illuminate\Database\QueryException $e) {
            error_log($e->getMessage());
            return redirect()->route('list_articulos')->with('message', ['danger', 'Erro al modificar el Articulo Seleccionado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Articulo $articulo)
    {
        $estado = true;

        if ($articulo->ESTADO_ARTICULO) {
          $estado = false;
        }

        $articulo->ESTADO_ARTICULO = $estado;
        $articulo->save();

        if ($estado) {
          return redirect()->route('list_articulos')->with('message', ['success', 'Articulo habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_articulos')->with('message', ['success', 'Articulo Desabilitado Correctamente!']);
        }
    }
}
