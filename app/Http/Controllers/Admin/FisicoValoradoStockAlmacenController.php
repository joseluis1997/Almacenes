<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Partida;
use DB;
use Carbon\Carbon;


class FisicoValoradoStockAlmacenController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $partidas = Partida::all();
    return view('admin.ResumenFisicoValoradoStockAlmacen.index', compact('partidas'));
  }

  public $partida_ok = FALSE;
  public function createReport(Request $request){
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
      $query->with(['Medida' => function($query2) {
        $query2->select('COD_MEDIDA','NOM_MEDIDA');
      }]);
    }])->get();

    //dd($partidas[0]);

    // return view('admin.ResumenFisicoValoradoStockAlmacen.Reporte',[
    //   'partidas'=>$partidas,
    // ]);
    if($option == 1){
      $reportePDF = \PDF::loadView('admin.ResumenFisicoValoradoStockAlmacen.Reporte', compact('partidas','mytime')) ->setPaper('a4', 'landscape');;
      return $reportePDF->download('RepResFisValoradoStockAlmacen.pdf');
    }else if($option == 2){
        return view('admin.ResumenFisicoValoradoStockAlmacen.show',[
        'partidas'=>$partidas,
        'mytime'=> $mytime,
        ]);
    }else{
      return redirect()->route('list_FisicoValoradoStockAlmacen')->with('message', ['danger', 'Error, Debe Seleccionar una Opcion']);
    }
  }
}
