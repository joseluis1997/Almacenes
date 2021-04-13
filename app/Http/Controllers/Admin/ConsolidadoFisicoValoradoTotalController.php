<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Partida;
use DB;
use Carbon\Carbon;

class ConsolidadoFisicoValoradoTotalController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $partidas = Partida::all();
    return view('admin.ReporteConsolidadoValoradoTotal.index', compact('partidas'));
  }
  public $partida_ok = FALSE;

  public function RepConsolidadoValoradoTotal(Request $request){
    $cod_partida = $request->get('partida');
    $option = $request->get('option');
    $mytime = Carbon::now();
    $mytime->toDateTimeString();
    $partida = null;

    if($cod_partida != null && $cod_partida > 0){
      $this->partida_ok = TRUE;
      $partida = Partida::find($cod_partida);
      $partida = $partida->NRO_PARTIDA;
    }
 
    $partidaQuery = Partida::query();
    if ($this->partida_ok) {
        $partidaQuery = $partidaQuery->where('COD_PARTIDA', '=', $cod_partida);
    }


    $partidas = $partidaQuery->with(['Articulos' => function($query) {
      $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, SUM(CANTIDAD) as total_cant_DCS, SUM(CANTIDAD*PRECIO_UNITARIO) as total_prec_DCS FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle_cs'), function ($join) {
          $join->on('detalle_cs.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
      });
      $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, SUM(CANTIDAD) as total_cant_SAL FROM DETALLE_SALIDA GROUP BY COD_ARTICULO) as detalle_sal'), function ($join) {
          $join->on('detalle_sal.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
      });
    }])->get();

    // dd($partidas[0]);


    // return view('admin.ReporteConsolidadoValoradoTotal.RepConsolidadoValTotal',[
    //   'partidas'=>$partidas,
    // ]);


    if($option == 1){
      $reportePDF = \PDF::loadView('admin.ReporteConsolidadoValoradoTotal.RepConsolidadoValTotal', compact('partidas','mytime'));
      return $reportePDF->download('RepResFisValorTotal.pdf');
    }else if($option == 2){
      return view('admin.ReporteConsolidadoValoradoTotal.show',[
      'partidas'=>$partidas,
      'mytime'=> $mytime,
      ]);
    }else{
       return redirect()->route('list_ConsolidadoFisicoValoradoTotal')->with('message', ['danger', 'Error, Debe Seleccionar una Opcion']);
    }
  }
}
