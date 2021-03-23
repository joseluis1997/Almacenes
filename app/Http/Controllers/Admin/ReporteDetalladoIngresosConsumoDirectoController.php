<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partida;
use App\Area;

class ReporteDetalladoIngresosConsumoDirectoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $partidas = Partida::all();
    return view('admin.ReporteDetalladoDeIngresosPorConsumoDirecto.index', compact('partidas'));
  }

  public $partida_ok = FALSE;
  public $fecha_ok = FALSE;
  
  public function createReport(Request $request){
    $cod_partida = $request->get('partida');
    $partida = null;
    if($cod_partida != null && $cod_partida > 0){
      $this->partida_ok = TRUE;
      $partida = Partida::find($cod_partida);
      $partida = $partida->NRO_PARTIDA;
    }
    $fecha_inicio = $request->get('fecha_inicio');
    $fecha_fin = $request->get('fecha_fin');
    if ($fecha_inicio != null && $fecha_fin != null) {
      $date_inicio = \DateTime::createFromFormat('Y-m-d', $fecha_inicio);
      $date_fin = \DateTime::createFromFormat('Y-m-d', $fecha_fin);
      if ($date_fin > $date_fin) {
        $this->fecha_ok = TRUE;
      }
    }
    // dd($fecha_inicio);
    $partidaQuery = Partida::query();
    if ($this->partida_ok) {
      $partidaQuery = $partidaQuery->where('COD_PARTIDA', '=', $cod_partida);
    }
    $partidas = $partidaQuery->with(['Articulos' => function($query) {
      $query->with(['ConsumosDirectos' => function($query2) {
        if ($this->fecha_ok) {
          $query2->whereDate('FECHA', '>=', $this->fecha_inicio)
          ->whereDate('FECHA', '<=', $this->fecha_fin)
          ->orderBy('COD_CONSUMO_DIRECTO', 'desc')
          ->with(['Area' => function($query3) {
            $query3->select('COD_AREA', 'NOM_AREA');
          }]);
        }else{
          $query2->orderBy('COD_CONSUMO_DIRECTO', 'desc')
          ->with(['Area' => function($query3) {
            $query3->select('COD_AREA', 'NOM_AREA');
          }]);
        }
      }])
      ->with(['Medida' => function($query) {
        $query->select('COD_MEDIDA', 'NOM_MEDIDA');
      }]);
    }])
    ->get();

    // dd($partidas[0]->Articulos);


    // return view('admin.ReporteDetalladoDeIngresosPorConsumoDirecto.Reporte', [
    //   'partidas'=> $partidas,
    //   'partida_ok'=> $this->partida_ok,
    //   'partida'=> $partida,
    //   'fecha_ok'=> $this->fecha_ok,
    //   'fecha_inicio'=> $fecha_inicio,
    //   'fecha_fin'=> $fecha_fin,
    // ]);

    $reporteInventarioActual = \PDF::loadView('admin.ReporteDetalladoDeIngresosPorConsumoDirecto.Reporte', [
      'partidas'=> $partidas,
      'partida_ok'=> $this->partida_ok,
      'partida'=> $partida,
      'fecha_ok'=> $this->fecha_ok,
      'fecha_inicio'=> $fecha_inicio,
      'fecha_fin'=> $fecha_fin,
    ])
    ->setPaper('a4', 'landscape');
    return $reporteInventarioActual->download('ReporteDetalladoDeIngresosPorConsumoDirecto.pdf');
  }
}
