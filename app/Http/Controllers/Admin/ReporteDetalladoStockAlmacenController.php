<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partida;
use App\Area;
use Carbon\Carbon;


class ReporteDetalladoStockAlmacenController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $partidas = Partida::all();
    return view('admin.ReporteDetalladoStockAlmacen.index', compact('partidas'));
  }

  public $partida_ok = FALSE;
  public $fecha_ok = FALSE;
  public $fecha_inicio = " ";
  public $fecha_fin = " ";

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

    
    $this->fecha_inicio = $request->get('fecha_inicio');
    $this->fecha_fin = $request->get('fecha_fin');
    if ($this->fecha_inicio != null && $this->fecha_fin != null) {
        $date_inicio = \DateTime::createFromFormat('Y-m-d', $this->fecha_inicio);
        $date_fin = \DateTime::createFromFormat('Y-m-d', $this->fecha_fin);
        if ($date_inicio <= $date_fin) {
          $this->fecha_ok = TRUE;
      }
    }
    // dd($fecha_inicio);
    $partidaQuery = Partida::query();
    if ($this->partida_ok) {
      $partidaQuery = $partidaQuery->where('COD_PARTIDA', '=', $cod_partida);
    }
    $partidas = $partidaQuery->with(['Articulos' => function($query) {
      $query->with(['ComprasStocks' => function($query2) {
        if ($this->fecha_ok) {
          $query2->whereDate('FECHA', '>=', $this->fecha_inicio)
          ->whereDate('FECHA', '<=', $this->fecha_fin)
          ->orderBy('COD_COMPRA_STOCK', 'asc')
          ->with(['Area' => function($query3) {
            $query3->select('COD_AREA', 'NOM_AREA');
          }]);
        }else{
          $query2->orderBy('COD_COMPRA_STOCK', 'asc')
          ->with(['Area' => function($query3) {
            $query3->select('COD_AREA', 'NOM_AREA');
          }]);
        }
      }])
      ->with(['Medida' => function($query2) {
        $query2->select('COD_MEDIDA', 'NOM_MEDIDA');
      }]);
    }])
    ->get();

    // dd($partidas[0]->Articulos);


    // return view('admin.ReporteDetalladoStockAlmacen.Reporte', [
    //   'partidas'=> $partidas,
    //   'partida_ok'=> $this->partida_ok,
    //   'partida'=> $partida,
    //   'fecha_ok'=> $this->fecha_ok,
    //   'fecha_inicio'=> $fecha_inicio,
    //   'fecha_fin'=> $fecha_fin,
    // ]);

    if($option == 1){
      $reporteInventarioActual = \PDF::loadView('admin.ReporteDetalladoStockAlmacen.Reporte', [
      'partidas'=> $partidas,
      'partida_ok'=> $this->partida_ok,
      'partida'=> $partida,
      'fecha_ok'=> $this->fecha_ok,
      'fecha_inicio'=> $this->fecha_inicio,
      'fecha_fin'=> $this->fecha_fin,
      'mytime'=> $mytime,
    ])
    ->setPaper('a4', 'landscape');
    return $reporteInventarioActual->download('ReporteDetalladoStockAlmacen.pdf');
    }else if($option == 2){
      return view('admin.ReporteDetalladoStockAlmacen.show', [
      'partidas'=> $partidas,
      'partida_ok'=> $this->partida_ok,
      'partida'=> $partida,
      'fecha_ok'=> $this->fecha_ok,
      'fecha_inicio'=> $this->fecha_inicio,
      'fecha_fin'=> $this->fecha_fin,
      'mytime'=> $mytime,
    ]);
    }else{
      return redirect()->route('list_ReporteDetalladoStockAlmacen')->with('message', ['danger', 'Error, Debe Seleccionar una Opcion']);
    }

 
  }
  
}
