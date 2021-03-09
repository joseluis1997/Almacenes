<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
