<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Partida;

class FisicoValoradoConsumoDirectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.ReporteFisicoValoradoConsumoDirecto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
=======
use App\Articulo;
use App\Partida;
use DB;

class FisicoValoradoConsumoDirectoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('admin.ResumenFisicoValoradoConsumoDirecto.index');
  }

  public function createReport(){
    $partidas = Partida::with(['Articulos' => function($query) {
      $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, SUM(CANTIDAD) as total_cantidad, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_CONSUMO_DIRECTO GROUP BY COD_ARTICULO) as detalle'), function ($join) {
          $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
      });
    }])->get();
    // return view('admin.ResumenFisicoValoradoConsumoDirecto.Reporte', compact('partidas'));

    $reporteInventarioActual = \PDF::loadView('admin.ResumenFisicoValoradoConsumoDirecto.Reporte', compact('partidas'));
    return $reporteInventarioActual->download('RepResFisValorDirect.pdf');
 }
>>>>>>> 15971a98eb90717295644f1234ec7c3785bb1b79
}
