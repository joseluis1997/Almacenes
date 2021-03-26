<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Partida;
use DB;

class InventarioActualController extends Controller
{

  public function index(){
    $partidas = Partida::all();
    return view('admin.ReporteInventarioActual.index', compact('partidas'));
  }

  public $partida_ok = FALSE;
  public function createReport(Request $request){
    $cod_partida = $request->get('partida');
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

   	//dd($partidas);

    return view('admin.ReporteInventarioActual.RepInventarioActual', compact('partidas'));

    // $reporteInventarioActual = \PDF::loadView('admin.ReporteInventarioActual.RepInventarioActual', compact('partidas'));
    // return $reporteInventarioActual->download('RepInventarioActual.pdf');
  }

  public function createReportRespaldo(Request $request){
    // $partidas = Partida::with(['Articulos' => function($query) {
    //     $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //         $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
    //     });
    // }])->get();

    // $partidas = Partida::with(['Articulos' => function($query) {
    //     $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, COUNT(CANTIDAD) as total_cantidad, SUM(PRECIO_UNITARIO) as total_precio FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //         $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
    //     });
    // }])->get();

    //   $partidas = Partida::where('COD_PARTIDA', '=' , )->with(['Articulos' => function($query) {
    //     $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, COUNT(CANTIDAD) as total_cantidad, SUM(PRECIO_UNITARIO) as total_precio FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //         $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
    //     });
    // }])->get();
    // $partidas = Partida::with(['Articulos' => function($query) {
    //   $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, COUNT(CANTIDAD) as total_cantidad, SUM(PRECIO_UNITARIO) as total_precio FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //       $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
    //   });
    // }])->get();

    // $partidas = Partida::with(['Articulos' => function($query) {
    //     $query->with(['ComprasStocks' => function($query2) {
    //      $query2->orderBy('COD_COMPRA_STOCK', 'desc');
    //     }]);
    // }])->get();

    // dd($partidas[0]->Articulos);

    // TODO => Consulta para sacar solo de un articulo
    // $articulos = Articulo::leftJoin(DB::raw('(SELECT COD_ARTICULO as CD, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //         $join->on('detalle.CD', '=', 'ARTICULO.COD_ARTICULO');
    //         $join->where('detalle.CD','=',1) ;
    //     })->where('COD_ARTICULO','=',1)->get();
  }
}