<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Partida;
use DateTime;
use \Carbon\Carbon;
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
    $option = $request->get('option');

    $mytime = Carbon::now();
    $mytime->toDateTimeString();

    // $mytime = Carbon::now();
    // $mytime->toRfc850String();

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

    if($option == 1){
      $reporteInventarioActual = \PDF::loadView('admin.ReporteInventarioActual.RepInventarioActual', compact('partidas','mytime'));
      return $reporteInventarioActual->download('RepInventarioActual.pdf');
    }else{
      return view('admin.ReporteInventarioActual.showInvActu', compact('partidas','mytime'));
    }

  }
}