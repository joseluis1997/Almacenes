<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Partida;
use Carbon\Carbon;

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
    $partidas = Partida::all();
    return view('admin.ResumenFisicoValoradoConsumoDirecto.index', compact('partidas'));
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
      $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, SUM(CANTIDAD) as total_cantidad, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_CONSUMO_DIRECTO GROUP BY COD_ARTICULO) as detalle'), function ($join) {
          $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
      });
      $query->with(['Medida' => function($query2) {
        $query2->select('COD_MEDIDA','NOM_MEDIDA');
      }]);
    }])->get();
    
    // return view('admin.ResumenFisicoValoradoConsumoDirecto.Reporte', compact('partidas'));

    if($option ==1){
      $reporteInventarioActual = \PDF::loadView('admin.ResumenFisicoValoradoConsumoDirecto.Reporte', compact('partidas','mytime'));
      return $reporteInventarioActual->download('RepResFisValorDirect.pdf');
    }else if($option == 2){
      return view('admin.ResumenFisicoValoradoConsumoDirecto.show', compact('partidas','mytime'));
    }else{
      return redirect()->route('list_FisicoValoradoConsumoDirecto')->with('message', ['danger', 'Error, Debe Seleccionar una Opcion']);
    }

 }
}
